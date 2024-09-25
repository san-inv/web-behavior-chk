#!/usr/bin/env bash

read_link_com=`readlink -f .`
html_dir="http://localhost:8080${read_link_com##*www}"

echo -e " ※ 以下のURLでPHP動作確認ができます。\n"
for file_name in `find . -type f | grep -e \.php$ -e \.html$ -e \.htm$ | sed -e "s/^\.//g"`
do
   echo ${html_dir}${file_name}
done


