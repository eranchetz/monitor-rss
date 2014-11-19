#!/bin/bash
# This script uses a syntetic title feed and calculates the gap between timenow and timein last item in feed
#Run the script with the debug parameter to get more info ( ./check_content_update.sh debug)
# http://rumblenews.blob.core.windows.net/data2/536/getSItems.json
# CDN http://az337102.vo.msecnd.net/data2/536/getSItems.json

DEBUG=$1

EPOCHRSS1=`curl  -s  'http://az337102.vo.msecnd.net/data2/536/getSItems.json' | awk -F ',' '{ print $6 }' | sed s/\"//g`
EPOCHRSS2=`curl  -s  'http://rumblenews.blob.core.windows.net/data2/536/getSItemsI.json' | awk -F ',' '{ print $8 }' | sed s/\"//g`

EPOCHNOW=`date +"%s"`

if [ -z "$EPOCHRSS2" ] ; then
  GAP=`expr $EPOCHNOW - $EPOCHRSS1`
  GAP2=999999
else
  GAP=`expr $EPOCHNOW - $EPOCHRSS1`
  GAP2=`expr $EPOCHNOW - $EPOCHRSS2`
fi

if [ $DEBUG ]  ; then echo "GapSItems : $GAP GapSItmesI : $GAP2"

fi
if [ $GAP -lt $GAP2 ];then
        echo " ${GAP}"
else
        echo "${GAP2}"
fi
