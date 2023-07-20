<script type="text/javascript">
function updateClock(){
    var today = new  Date();
    var dayName = today.getDay(),
        monthName = today.getMonth(),
        dateName = today.getDate(),
        yr = today.getFullYear(),
        hours = today.getHours(),
        min = today.getMinutes(),
        sec = today.getSeconds(),
        pe = "AM";

        if(hours == 0){
            hou = 12;
        }
        if(hours > 12){
            hours = hours - 12;
            pe = "PM";
        }

        Number.prototype.pad = function(digits){
            for(var num = this.toString(); num.length < digits; num = 0 + num);
            return num;
        }

    var month = ["Jan","Feb","March","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
    var week = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
    var ids = ["dayname","months","daynum","year","hour","minutes","seconds","period"];
    var values = [week[dayName], month[monthName], dateName.pad(2), yr.pad(2), hours.pad(2), min.pad(2), sec.pad(2), pe];
    for(var i=0; i<ids.length; i++)
    document.getElementById(ids[i]).firstChild.nodeValue = values[i];

}
function initClock(){
    updateClock();
    window.setInterval("updateClock()", 1);
}
</script>