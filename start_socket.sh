#!/usr/bin/env bash

nohup php ws/run.php > /dev/null 2>&1 &
exec "$@"
