#!/bin/bash
read -s -p "Enter password:" passwd

if [ ! $# == 2 ]; then
  echo "Usage: $0 path_from path_to"
  exit
fi
php @upload.php $1 $2 $passwd
