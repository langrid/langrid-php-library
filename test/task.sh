#!/bin/sh
cd ../test/
export LANG=ja_JP.UTF-8
phpunit --testdox-text ./tmp/testdox.txt AllTests.php > ./tmp/stdout.txt
cat ./tmp/stdout.txt ./tmp/testdox.txt | mail langrid-ot@ai.soc.i.kyoto-u.ac.jp -s "Language Resource test with PHPUnit"