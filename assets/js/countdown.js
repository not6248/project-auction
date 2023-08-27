const setInnerHTMLById = (id, text) => document.getElementById(id).innerHTML = text;

function countdown_time(id, endtime) {
    $(document).ready(function () {
        let countDownDate = new Date(endtime).getTime();
        const minuteInMilliseconds = 60000;
        const hourInMilliseconds = 3600000;
        const dayInMilliseconds = 86400000;
        const td_id = id;
        //   const btn_item = "btn_item_" + id;
    
        // ฟังก์ชันเพื่ออัพเดทเวลานับถอยหลังและปุ่ม
        function updateCountdown() {
            let now = new Date().getTime();
            let distance = countDownDate - now;
            let days = Math.floor(distance / 86400000);
            let hours = Math.floor((distance % 86400000) / 3600000);
            let minutes = Math.floor((distance % 3600000) / 60000);
            let seconds = Math.floor((distance % 60000) / 1000);
    
            let ElementID_td_id = document.getElementById(td_id);
    
            if (distance < minuteInMilliseconds) {
                setInnerHTMLById(td_id, seconds + "วิ ");
            } else if (distance < hourInMilliseconds) {
                setInnerHTMLById(td_id, minutes + "นาที " + seconds + "วิ ");
            } else if (distance < dayInMilliseconds) {
                if (minutes < 1) {
                    setInnerHTMLById(td_id, hours + "ชั่วโมง " + seconds + "วิ ");
                } else {
                    setInnerHTMLById(td_id, hours + "ชั่วโมง " + minutes + "นาที " + seconds + "วิ");
                }
            } else if (distance >= dayInMilliseconds && hours < 1) {
                setInnerHTMLById(td_id, days + "วัน ");
            } else {
                setInnerHTMLById(td_id, days + "วัน " + hours + "ชั่วโมง ");
            }
    
            if (distance < 0) {
                ElementID_td_id.style.color = "black";
                ElementID_td_id.innerHTML = "หมดเวลา";
                //   document.getElementById(btn_item).innerHTML = '<button disabled>หมดเวลา</button>';
                //   clearInterval(intervalMap[id]);
                //   updateStatus(id);
                //   delete intervalMap[id];
            } else {
                //   document.getElementById(btn_item).innerHTML = '<button onclick="console.log(\'ทดสอบ\');">ยังไม่หมดเวลา</button>';
                if (distance <= hourInMilliseconds) {
                    ElementID_td_id.style.color = "red";
                }
            }
        }
    
        // เรียกใช้ฟังก์ชันเพื่อเริ่มต้นการนับถอยหลังและปรับปรุงเวลาทุกๆ 1 วินาที
        // updateCountdown();
        let x = setInterval(updateCountdown, 1000);
        //   intervalMap[id] = x;
        //   console.log(`NOW intervalMap[item_id${id}].interval[${x}]`);
    });
}