#!/bin/bash
# http://rumblenews.blob.core.windows.net/data2/536/getSItems.json
# CDN http://az337102.vo.msecnd.net/data2/536/getSItems.json

#EPOCHRSS1=`curl  -s  'http://az337102.vo.msecnd.net/data2/536/getSItems.json' | awk -F ',' '{ print $6 }' | sed s/\"//g`
EPOCHRSS2=`curl  -s  'http://az337102.vo.msecnd.net/data2/536/getSItemsI.json' | awk -F ',' '{ print $8 }' | sed s/\"//g`

EPOCHNOW=`date +"%s"`

#echo $EPOCHRSS2 $EPOCHRSS1 $EPOCHNOW

#GAP=`expr $EPOCHNOW - $EPOCHRSS1`
GAP2=`expr $EPOCHNOW - $EPOCHRSS2`

#echo "Gap1Hour = ${GAP}"
echo "${GAP2}"
