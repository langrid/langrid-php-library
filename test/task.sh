#!/bin/sh
#cd ../test/
phpunit --testdox-text ./tmp/testdox.txt AllTests.php > ./tmp/stdout.txt
cat ./tmp/stdout.txt ./tmp/testdox.txt | mail ic.admin@ai.soc.i.kyoto-u.ac.jp -s "Language Resource test with PHPUnit"
