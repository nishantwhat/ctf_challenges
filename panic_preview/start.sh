#!/bin/bash
set -e


# start admin service in background
python3 admin.py &
ADMIN_PID=$!


# start exif server in background
python3 exif_server.py &
EXIF_PID=$!


# start thumbit (public) in foreground
python3 thumbit.py


# cleanup
kill $ADMIN_PID $EXIF_PID || true