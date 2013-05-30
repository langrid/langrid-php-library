#!/bin/sh
cd /srv/langrid-php-library/test/
phpunit --testdox-text ./tmp/testdox.txt AllTests.php > ./tmp/stdout.txt
cat ./tmp/stdout.txt ./tmp/testdox.txt | mail server-admin@ai.soc.i.kyoto-u.ac.jp  -s "Language Resource test with PHPUnit"
cat ./tmp/stdout.txt ./tmp/testdox.txt | mail kubo@infonic.co.jp  -s "Language Resource test with PHPUnit"
