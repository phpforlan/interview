#! /bin/sh
for fileName in `ls -l | awk '$5>10240{print $9}'`
do
    echo $fileName
done
    
