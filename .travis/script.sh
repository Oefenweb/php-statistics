#!/usr/bin/env bash
#
# set -x;
set -e;
set -o pipefail;
#
thisFile="$(readlink -f ${0})";
thisFilePath="$(dirname ${thisFile})";
#
if [ "${PHPCS}" = '1' ]; then
  vendor/bin/phpcs --standard=PSR2 src tests;
elif [ "${CODECOVERAGE}" = '1' ]; then
  phpdbg -qrr vendor/bin/phpunit --stderr --configuration phpunit.xml --coverage-clover build/logs/clover.xml;
else
  vendor/bin/phpunit --stderr --configuration phpunit.xml;
fi
