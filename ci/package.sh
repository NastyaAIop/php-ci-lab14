#!/usr/bin/env bash
set -euo pipefail

mkdir -p dist

revision="${GITHUB_SHA:-local}"
printf '%s\n' "$revision" > dist/REVISION.txt

tar -czf dist/php-app.tar.gz \
  src public vendor composer.json composer.lock \
  README.md -C dist REVISION.txt

tar -tzf dist/php-app.tar.gz
