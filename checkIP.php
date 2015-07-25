<?php
    header("Content-type: text/html; charset=gbk");
    function ipCity($userip)
    {

        $dat_path = 'qqwry.dat';

        if (!ereg("^([0-9]{1,3}.){3}[0-9]{1,3}$", $userip)) {
            return 'IP Address Invalid';
        }

        if (!$fd = @fopen($dat_path, 'rb')) {
            return 'IP data file not exists or access denied';
        }

        $userip = explode('.', $userip);
        $useripNum = $userip[0] * 16777216 + $userip[1] * 65536 + $userip[2] * 256 + $userip[3];

        $DataBegin = fread($fd, 4);
        $DataEnd = fread($fd, 4);
        $useripbegin = implode('', unpack('L', $DataBegin));
        if ($useripbegin < 0) {
            $useripbegin += pow(2, 32);
        }
        $useripend = implode('', unpack('L', $DataEnd));
        if ($useripend < 0) {
            $useripend += pow(2, 32);
        }
        $useripAllNum = ($useripend - $useripbegin) / 7 + 1;
        $BeginNum = 0;
        $EndNum = $useripAllNum;

        while ($userip1num > $useripNum || $userip2num < $useripNum) {
            $Middle = intval(($EndNum + $BeginNum) / 2);

            fseek($fd, $useripbegin + 7 * $Middle);
            $useripData1 = fread($fd, 4);
            if (strlen($useripData1) < 4) {
                fclose($fd);
                return 'File Error';
            }

            $userip1num = implode('', unpack('L', $useripData1));
            if ($userip1num < 0) {
                $userip1num += pow(2, 32);
            }

            if ($userip1num > $useripNum) {
                $EndNum = $Middle;
                continue;
            }

            $DataSeek = fread($fd, 3);
            if (strlen($DataSeek) < 3) {
                fclose($fd);
                return 'File Error';
            }
            $DataSeek = implode('', unpack('L', $DataSeek . chr(0)));
            fseek($fd, $DataSeek);
            $useripData2 = fread($fd, 4);
            if (strlen($useripData2) < 4) {
                fclose($fd);
                return 'File Error';
            }
            $userip2num = implode('', unpack('L', $useripData2));
            if ($userip2num < 0) {
                $userip2num += pow(2, 32);
            }

            if ($userip2num < $useripNum) {
                if ($Middle == $BeginNum) {
                    fclose($fd);
                    return 'No Data';
                }
                $BeginNum = $Middle;
            }
        }
        $useripFlag = fread($fd, 1);
        if ($useripFlag == chr(1)) {
            $useripSeek = fread($fd, 3);
            if (strlen($useripSeek) < 3) {
                fclose($fd);
                return 'System Error';
            }
            $useripSeek = implode('', unpack('L', $useripSeek . chr(0)));
            fseek($fd, $useripSeek);
            $useripFlag = fread($fd, 1);
        }
        if ($useripFlag == chr(2)) {
            $AddrSeek = fread($fd, 3);
            if (strlen($AddrSeek) < 3) {
                fclose($fd);
                return 'System Error';
            }
            $useripFlag = fread($fd, 1);
            if ($useripFlag == chr(2)) {
                $AddrSeek2 = fread($fd, 3);
                if (strlen($AddrSeek2) < 3) {
                    fclose($fd);
                    return 'System Error';
                }
                $AddrSeek2 = implode('', unpack('L', $AddrSeek2 . chr(0)));
                fseek($fd, $AddrSeek2);
            } else {
                fseek($fd, -1, SEEK_CUR);
            }
            while (($char = fread($fd, 1)) != chr(0)) {
                $useripAddr2 .= $char;
            }
            $AddrSeek = implode('', unpack('L', $AddrSeek . chr(0)));
            fseek($fd, $AddrSeek);
            while (($char = fread($fd, 1)) != chr(0)) {
                $useripAddr1 .= $char;
            }
        } else {
            fseek($fd, -1, SEEK_CUR);
            while (($char = fread($fd, 1)) != chr(0)) {
                $useripAddr1 .= $char;
            }
            $useripFlag = fread($fd, 1);
            if ($useripFlag == chr(2)) {
                $AddrSeek2 = fread($fd, 3);
                if (strlen($AddrSeek2) < 3) {
                    fclose($fd);
                    return 'System Error';
                }
                $AddrSeek2 = implode('', unpack('L', $AddrSeek2 . chr(0)));
                fseek($fd, $AddrSeek2);
            } else {
                fseek($fd, -1, SEEK_CUR);
            }
            while (($char = fread($fd, 1)) != chr(0)) {
                $useripAddr2 .= $char;
            }
        }
        fclose($fd);

        if (preg_match('/http/i', $useripAddr2)) {
            $useripAddr2 = '';
        }
        $useripaddr = "$useripAddr1 $useripAddr2";
        $useripaddr = preg_replace('/CZ88.Net/is', '', $useripaddr);
        $useripaddr = preg_replace('/^s*/is', '', $useripaddr);
        $useripaddr = preg_replace('/s*$/is', '', $useripaddr);
        if (preg_match('/http/i', $useripaddr) || $useripaddr == '') {
            $useripaddr = 'No Data';
        }
        return $useripaddr;
    }
//    $data = ipCity("10.0.0.1");
//    print $data;
