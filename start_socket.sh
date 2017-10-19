#!/usr/bin/env bash

nohup php ws/run.php &
exec "$@"
