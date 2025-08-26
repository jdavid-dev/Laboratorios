// Canvas
        function draw() {
            const canvas = document.getElementById('canvasArea');
            const ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.clearRect(0, 0, canvas.width -5, canvas.height -5);
            ctx.beginPath();
            ctx.arc(150, 100, 50, 0, 2 * Math.PI);
            ctx.fillStyle = '#e74c3c';
            ctx.fill();
        }

        function draw2() {
            const canvas = document.getElementById('canvasArea2');
            const ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.beginPath();
            ctx.rect(50, 50, 200, 100);
            ctx.lineWidth = 6;
            ctx.strokeStyle = 'red';
            ctx.stroke();
            ctx.beginPath();
            ctx.lineWidth = 4;
            ctx.strokeStyle = 'blue';
            ctx.rect(70, 70, 160, 60);
            ctx.stroke();
            ctx.beginPath();
            ctx.arc(150, 100, 20, 0, 2 * Math.PI);
            ctx.fillStyle = 'purple';
            ctx.fill();
            ctx.stroke();
        }

        function draw3() {
            const canvas = document.getElementById('canvasArea3');
            const ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.beginPath();
            ctx.moveTo(150, 50);
            ctx.lineTo(100, 150);
            ctx.lineTo(200, 150);
            ctx.closePath();
            ctx.fillStyle = 'yellow';
            ctx.fill();
            ctx.lineWidth = 4;
            ctx.strokeStyle = 'black';
            ctx.stroke();
        }

        // Drag and Drop
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            const data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }

        // FileReader
        function previewFile(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }