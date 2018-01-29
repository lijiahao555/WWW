<?php
//shell处理日志，获取所有ip
'cat access.log | grep "04/Mar/2016" | awk '{print $1}' | sort | uniq -c | sort –nr';