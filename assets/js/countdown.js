function countdown_time(id, starttime, endtime) {
    $(document).ready(function () {
        const element = $('#' + id); // ใช้ jQuery ในการเลือก element โดยใช้ id

        // ฟังก์ชันเพื่ออัพเดทเวลานับถอยหลังและข้อความ
        function updateCountdown() {
            let now = new Date().getTime();
            let start = new Date(starttime).getTime();
            let end = new Date(endtime).getTime();
        
            if (now < start) {
                // กำลังเริ่ม
                let timeUntilStart = start - now;
                let days = Math.floor(timeUntilStart / (1000 * 60 * 60 * 24)); // คำนวณจำนวนวัน
                let hours = Math.floor((timeUntilStart % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((timeUntilStart % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((timeUntilStart % (1000 * 60)) / 1000);
        
                // ใช้ jQuery เพื่อเปลี่ยนเนื้อหาของ HTML element
                element.html("กำลังเริ่มจะเริ่มประมูล ภายใน <br>" + days + " Day " + hours + ":" + minutes + ":" + seconds + "s");
            } else if (now >= start && now <= end) {
                // กำลังประมูล
                let timeUntilEnd = end - now;
                let days = Math.floor(timeUntilEnd / (1000 * 60 * 60 * 24)); // คำนวณจำนวนวัน
                let hours = Math.floor((timeUntilEnd % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((timeUntilEnd % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((timeUntilEnd % (1000 * 60)) / 1000);
        
                // ใช้ jQuery เพื่อเปลี่ยนเนื้อหาของ HTML element
                element.html("จะหมดเวลาประมูลภายใน <br>" + days + " Day " + hours + ":" + minutes + ":" + seconds + "s");
            } else {
                // หมดเวลา
                // ใช้ jQuery เพื่อเปลี่ยนเนื้อหาของ HTML element
                element.html("หมดเวลา<br><br>");
            }
        }
        updateCountdown();
        let x = setInterval(updateCountdown, 1000);
    });
}
