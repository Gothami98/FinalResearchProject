<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day and Night Sorting Game</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #87CEEB 0%, #98FB98 50%, #DDA0DD 100%);
            min-height: 100vh;
            padding: 20px;
            overflow-x: hidden;
        }
        
        .game-container {
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            color: #2c3e50;
        }
        
        .title {
            text-align: center;
            font-size: 3.5em;
            color: #2c3e50;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: bounce 2s ease-in-out infinite;
        }
        
        .instructions {
            text-align: center;
            font-size: 2em;
            color: #34495e;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #e8f8ff, #cce7ff);
            padding: 25px;
            border-radius: 15px;
            border-left: 5px solid #3498db;
            font-weight: bold;
        }
        
        .drag-instruction {
            text-align: center;
            font-size: 1.8em;
            color: #34495e;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            padding: 20px;
            border-radius: 15px;
            border-left: 5px solid #f39c12;
            font-weight: bold;
        }
        
        .score-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            gap: 30px;
        }
        
        .score, .progress-score {
            text-align: center;
            font-size: 2em;
            font-weight: bold;
            padding: 20px 40px;
            border-radius: 15px;
            color: white;
        }
        
        .score {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }
        
        .progress-score {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
        }
        
        .game-area {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
            margin: 40px 0;
        }
        
        .objects-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 30px;
            border-radius: 20px;
            border: 3px solid #3498db;
        }
        
        .section-title {
            font-size: 1.8em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .objects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 20px;
            min-height: 400px;
        }
        
        .drop-zones-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .drop-zone-container {
            padding: 20px;
            border-radius: 20px;
            border: 3px solid;
        }
        
        .day-container {
            background: linear-gradient(135deg, #87CEEB 0%, #FFE4B5 50%, #F0E68C 100%);
            border-color: #FFA500;
            position: relative;
            overflow: hidden;
        }
        
        .day-container::before {
            content: '';
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, #FFD700 0%, #FFA500 100%);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
        }
        
        .night-container {
            background: linear-gradient(135deg, #191970 0%, #000080 50%, #4B0082 100%);
            border-color: #4169E1;
            position: relative;
            overflow: hidden;
        }
        
        .night-container::before {
            content: '';
            position: absolute;
            top: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: radial-gradient(circle, #F5F5DC 0%, #C0C0C0 100%);
            border-radius: 50%;
            clip-path: inset(0 25% 0 0);
        }
        
        .night-container::after {
            content: '⭐';
            position: absolute;
            top: 30px;
            left: 30px;
            font-size: 20px;
            animation: twinkle 2s ease-in-out infinite;
        }
        
        .drop-zone {
            min-height: 300px;
            border: 4px dashed;
            border-radius: 15px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            gap: 15px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.3);
            position: relative;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .day-container .drop-zone {
            border-color: #FFA500;
        }
        
        .night-container .drop-zone {
            border-color: #4169E1;
        }
        
        .drop-zone.drag-over {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        
        .day-container .drop-zone.drag-over {
            background: rgba(255, 215, 0, 0.2);
        }
        
        .night-container .drop-zone.drag-over {
            background: rgba(65, 105, 225, 0.2);
        }
        
        .object-card {
            width: 120px;
            height: 120px;
            border-radius: 15px;
            border: 3px solid #bdc3c7;
            cursor: grab;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #fff, #f8f9fa);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            font-size: 3em;
            user-select: none;
        }
        
        .object-card:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
            border-color: #3498db;
        }
        
        .object-card.dragging {
            transform: rotate(5deg) scale(1.1);
            z-index: 1000;
            cursor: grabbing;
            opacity: 0.8;
        }
        
        .object-card.in-drop-zone {
            width: 80px;
            height: 80px;
            font-size: 2em;
            border-color: #27ae60;
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
        }
        
        .object-card.correct {
            border-color: #28a745;
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            animation: correctPulse 0.5s ease-in-out;
        }
        
        .object-card.incorrect {
            border-color: #dc3545;
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            animation: shake 0.5s ease-in-out;
        }
        
        .zone-title {
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
        
        .day-container .zone-title {
            color: #FF8C00;
        }
        
        .night-container .zone-title {
            color: #E6E6FA;
        }
        
        .count-display {
            text-align: center;
            margin: 10px 0;
            font-size: 1.5em;
            font-weight: bold;
        }
        
        .day-container .count-display {
            color: #FF8C00;
        }
        
        .night-container .count-display {
            color: #E6E6FA;
        }
        
        .feedback {
            text-align: center;
            font-size: 2.5em;
            margin: 30px 0;
            padding: 25px;
            border-radius: 15px;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .feedback.success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border: 3px solid #28a745;
            animation: successPulse 1s ease-in-out;
        }
        
        .feedback.progress {
            background: linear-gradient(135deg, #e1f5fe, #b3e5fc);
            color: #01579b;
            border: 3px solid #03a9f4;
            animation: progressPulse 0.5s ease-in-out;
        }
        
        .feedback.error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border: 3px solid #dc3545;
            animation: shake 0.5s ease-in-out;
        }
        
        .next-btn {
            display: block;
            margin: 30px auto;
            padding: 20px 50px;
            font-size: 1.8em;
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0;
            visibility: hidden;
        }
        
        .next-btn.show {
            opacity: 1;
            visibility: visible;
        }
        
        .next-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 107, 107, 0.4);
        }
        
        .celebration {
            text-align: center;
            font-size: 3em;
            margin: 20px 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease;
        }
        
        .celebration.show {
            opacity: 1;
            visibility: visible;
            animation: celebrate 1.5s ease-in-out;
        }
        
        .empty-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.2em;
            color: #7f8c8d;
            text-align: center;
            pointer-events: none;
        }
        
        @media (max-width: 768px) {
            .game-area {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .drop-zones-section {
                grid-template-columns: 1fr;
            }
            
            .objects-grid {
                grid-template-columns: repeat(4, 1fr);
            }
            
            .object-card {
                width: 80px;
                height: 80px;
                font-size: 2em;
            }
            
            .object-card.in-drop-zone {
                width: 60px;
                height: 60px;
                font-size: 1.5em;
            }
            
            .title {
                font-size: 2.5em;
            }
            
            .score-container {
                flex-direction: column;
                gap: 15px;
            }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
        
        @keyframes correctPulse {
            0% { transform: scale(1); box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); }
            50% { transform: scale(1.1); box-shadow: 0 0 30px rgba(40, 167, 69, 0.8); }
            100% { transform: scale(1); box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        @keyframes successPulse {
            0% { transform: scale(1); box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); }
            50% { transform: scale(1.05); box-shadow: 0 0 30px rgba(40, 167, 69, 0.8); }
            100% { transform: scale(1); box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); }
        }
        
        @keyframes progressPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
        
        @keyframes celebrate {
            0%, 100% { transform: scale(1) rotate(0deg); }
            25% { transform: scale(1.2) rotate(-5deg); }
            75% { transform: scale(1.2) rotate(5deg); }
        }
    </style>
</head>
<body>
    <div class="game-container">
        <h1 class="title">🌞 Day & Night Sorting! 🌙</h1>
        
        <div class="instructions">
            Sort objects into Day and Night boxes!
        </div>
        
        <div class="drag-instruction">
            👆 Drag daytime objects to the Day box and nighttime objects to the Night box!
        </div>
        
        <div class="score-container">
            <div class="score">Score: <span id="score">0</span></div>
            <div class="progress-score">Sorted: <span id="sorted-count">0</span>/<span id="total-objects">8</span></div>
        </div>
        
        <div class="game-area">
            <div class="objects-section">
                <div class="section-title">🎪 Objects to Sort:</div>
                <div class="objects-grid" id="objects-grid">
                    <!-- Objects will be generated here -->
                </div>
            </div>
            
            <div class="drop-zones-section">
                <div class="drop-zone-container day-container">
                    <div class="zone-title">☀️ Daytime</div>
                    <div class="count-display">Day objects: <span id="day-count">0</span></div>
                    <div class="drop-zone" id="day-zone" data-type="day">
                        <div class="empty-message">Drop day objects here!</div>
                    </div>
                </div>
                
                <div class="drop-zone-container night-container">
                    <div class="zone-title">🌙 Nighttime</div>
                    <div class="count-display">Night objects: <span id="night-count">0</span></div>
                    <div class="drop-zone" id="night-zone" data-type="night">
                        <div class="empty-message">Drop night objects here!</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feedback" id="feedback"></div>
        <div class="celebration" id="celebration"></div>
        
        <button class="next-btn" id="next-btn" onclick="nextRound()">Next Round! 🎉</button>
    </div>

    <script>
        let score = 0;
        let dayCount = 0;
        let nightCount = 0;
        let totalSorted = 0;
        let totalObjects = 8;
        let gameComplete = false;
        let sortedObjects = [];
        
        const dayObjects = [
            { emoji: '☀️', name: 'Sun' },
            { emoji: '🌻', name: 'Sunflower' },
            { emoji: '🐝', name: 'Bee' },
            { emoji: '🦋', name: 'Butterfly' },
            { emoji: '🌈', name: 'Rainbow' },
            { emoji: '🐣', name: 'Baby Chick' },
            { emoji: '🌺', name: 'Hibiscus' },
            { emoji: '🌞', name: 'Sun with Face' },
            { emoji: '🐛', name: 'Bug' },
            { emoji: '🌷', name: 'Tulip' },
            { emoji: '🌼', name: 'Daisy' },
            { emoji: '🚗', name: 'Car' }
        ];
        
        const nightObjects = [
            { emoji: '🌙', name: 'Moon' },
            { emoji: '⭐', name: 'Star' },
            { emoji: '🦉', name: 'Owl' },
            { emoji: '🌟', name: 'Glowing Star' },
            { emoji: '🌌', name: 'Milky Way' },
            { emoji: '🦇', name: 'Bat' },
            { emoji: '🌃', name: 'Night City' },
            { emoji: '💫', name: 'Shooting Star' },
            { emoji: '🌛', name: 'Crescent Moon' },
            { emoji: '✨', name: 'Sparkles' },
            { emoji: '🔦', name: 'Flashlight' },
            { emoji: '🌚', name: 'New Moon Face' }
        ];
        
        const feedbackMessages = {
            correct: [
                "🎉 Great job! That's correct!",
                "⭐ Perfect! Well done!",
                "🌟 Excellent sorting!",
                "👏 Amazing work!",
                "🚀 You're doing great!"
            ],
            incorrect: [
                "🤔 Oops! Try again!",
                "❌ Not quite right!",
                "🔄 Let's try that again!",
                "💭 Think about when you see this!",
                "🎯 Almost there! Try again!"
            ],
            complete: [
                "🎊 Outstanding! You sorted everything perfectly! 🎊",
                "🏆 Amazing! You're a sorting champion! 🏆",
                "⭐ Incredible work! Perfect sorting! ⭐",
                "🌟 Fantastic! You mastered day and night! 🌟",
                "🎉 Excellent! You got them all right! 🎉"
            ]
        };
        
        function getRandomObjects() {
            const selectedDay = dayObjects.sort(() => 0.5 - Math.random()).slice(0, 4);
            const selectedNight = nightObjects.sort(() => 0.5 - Math.random()).slice(0, 4);
            const allObjects = [...selectedDay.map(obj => ({...obj, type: 'day'})), 
                             ...selectedNight.map(obj => ({...obj, type: 'night'}))];
            return allObjects.sort(() => 0.5 - Math.random());
        }
        
        function setupGame() {
            gameComplete = false;
            dayCount = 0;
            nightCount = 0;
            totalSorted = 0;
            sortedObjects = [];
            
            const gameObjects = getRandomObjects();
            displayObjects(gameObjects);
            updateCountDisplays();
            
            // Reset UI
            document.getElementById('feedback').textContent = '';
            document.getElementById('feedback').className = 'feedback';
            document.getElementById('next-btn').classList.remove('show');
            document.getElementById('celebration').classList.remove('show');
            
            // Clear drop zones
            clearDropZones();
        }
        
        function displayObjects(objects) {
            const grid = document.getElementById('objects-grid');
            grid.innerHTML = '';
            
            objects.forEach((obj, index) => {
                const card = document.createElement('div');
                card.className = 'object-card';
                card.textContent = obj.emoji;
                card.draggable = true;
                card.id = `object-${index}`;
                card.dataset.type = obj.type;
                card.dataset.name = obj.name;
                card.title = obj.name;
                
                // Drag event listeners
                card.addEventListener('dragstart', handleDragStart);
                card.addEventListener('dragend', handleDragEnd);
                
                grid.appendChild(card);
            });
        }
        
        function clearDropZones() {
            const dayZone = document.getElementById('day-zone');
            const nightZone = document.getElementById('night-zone');
            
            // Remove all object cards from drop zones
            dayZone.querySelectorAll('.object-card').forEach(card => card.remove());
            nightZone.querySelectorAll('.object-card').forEach(card => card.remove());
            
            // Show empty messages
            updateEmptyMessages();
        }
        
        function handleDragStart(e) {
            if (gameComplete) return;
            e.dataTransfer.setData('text/plain', e.target.id);
            e.target.classList.add('dragging');
        }
        
        function handleDragEnd(e) {
            e.target.classList.remove('dragging');
        }
        
        // Drop zone event listeners
        document.getElementById('day-zone').addEventListener('dragover', handleDragOver);
        document.getElementById('day-zone').addEventListener('drop', handleDrop);
        document.getElementById('day-zone').addEventListener('dragenter', handleDragEnter);
        document.getElementById('day-zone').addEventListener('dragleave', handleDragLeave);
        
        document.getElementById('night-zone').addEventListener('dragover', handleDragOver);
        document.getElementById('night-zone').addEventListener('drop', handleDrop);
        document.getElementById('night-zone').addEventListener('dragenter', handleDragEnter);
        document.getElementById('night-zone').addEventListener('dragleave', handleDragLeave);
        
        function handleDragOver(e) {
            e.preventDefault();
        }
        
        function handleDragEnter(e) {
            e.preventDefault();
            e.currentTarget.classList.add('drag-over');
        }
        
        function handleDragLeave(e) {
            if (!e.currentTarget.contains(e.relatedTarget)) {
                e.currentTarget.classList.remove('drag-over');
            }
        }
        
        function handleDrop(e) {
            e.preventDefault();
            const dropZone = e.currentTarget;
            dropZone.classList.remove('drag-over');
            
            if (gameComplete) return;
            
            const objectId = e.dataTransfer.getData('text/plain');
            const draggedObject = document.getElementById(objectId);
            
            if (draggedObject && !sortedObjects.includes(objectId)) {
                const objectType = draggedObject.dataset.type;
                const zoneType = dropZone.dataset.type;
                
                // Clone the object for the drop zone
                const clonedObject = draggedObject.cloneNode(true);
                clonedObject.classList.add('in-drop-zone');
                clonedObject.draggable = false;
                clonedObject.id = `dropped-${objectId}`;
                
                // Add remove functionality on click
                clonedObject.onclick = () => removeFromDropZone(clonedObject, objectId, zoneType);
                clonedObject.style.cursor = 'pointer';
                clonedObject.title = 'Click to remove';
                
                dropZone.appendChild(clonedObject);
                
                // Hide original object
                draggedObject.style.opacity = '0.3';
                draggedObject.draggable = false;
                draggedObject.style.cursor = 'not-allowed';
                
                sortedObjects.push(objectId);
                
                // Check if correct placement
                if (objectType === zoneType) {
                    clonedObject.classList.add('correct');
                    if (zoneType === 'day') {
                        dayCount++;
                    } else {
                        nightCount++;
                    }
                    totalSorted++;
                    score += 10;
                    showFeedback('correct');
                } else {
                    clonedObject.classList.add('incorrect');
                    showFeedback('incorrect');
                }
                
                updateCountDisplays();
                updateEmptyMessages();
                
                if (totalSorted === totalObjects) {
                    completeGame();
                }
            }
        }
        
        function removeFromDropZone(clonedObject, originalId, zoneType) {
            if (gameComplete) return;
            
            const wasCorrect = clonedObject.classList.contains('correct');
            
            clonedObject.remove();
            
            // Restore original object
            const originalObject = document.getElementById(originalId);
            originalObject.style.opacity = '1';
            originalObject.draggable = true;
            originalObject.style.cursor = 'grab';
            
            sortedObjects = sortedObjects.filter(id => id !== originalId);
            
            if (wasCorrect) {
                if (zoneType === 'day') {
                    dayCount--;
                } else {
                    nightCount--;
                }
                totalSorted--;
                score = Math.max(0, score - 10);
            }
            
            updateCountDisplays();
            updateEmptyMessages();
            
            // Clear feedback if game was complete
            if (gameComplete) {
                gameComplete = false;
                document.getElementById('next-btn').classList.remove('show');
                document.getElementById('celebration').classList.remove('show');
                document.getElementById('feedback').textContent = '';
                document.getElementById('feedback').className = 'feedback';
            }
        }
        
        function updateCountDisplays() {
            document.getElementById('day-count').textContent = dayCount;
            document.getElementById('night-count').textContent = nightCount;
            document.getElementById('sorted-count').textContent = totalSorted;
            document.getElementById('score').textContent = score;
        }
        
        function updateEmptyMessages() {
            const dayZone = document.getElementById('day-zone');
            const nightZone = document.getElementById('night-zone');
            const dayMessage = dayZone.querySelector('.empty-message');
            const nightMessage = nightZone.querySelector('.empty-message');
            
            dayMessage.style.display = dayCount === 0 ? 'block' : 'none';
            nightMessage.style.display = nightCount === 0 ? 'block' : 'none';
        }
        
        function showFeedback(type) {
            const feedback = document.getElementById('feedback');
            const messages = feedbackMessages[type];
            const message = messages[Math.floor(Math.random() * messages.length)];
            
            feedback.textContent = message;
            feedback.className = `feedback ${type === 'correct' ? 'progress' : 'error'}`;
        }
        
        function completeGame() {
            gameComplete = true;
            
            const feedback = document.getElementById('feedback');
            const completeMsg = feedbackMessages.complete[Math.floor(Math.random() * feedbackMessages.complete.length)];
            feedback.textContent = completeMsg;
            feedback.className = 'feedback success';
            
            const celebration = document.getElementById('celebration');
            celebration.textContent = "🎊 Perfect! You sorted all objects correctly! 🎊";
            celebration.classList.add('show');
            
            document.getElementById('next-btn').classList.add('show');
            
            // Disable remaining draggable objects
            const remainingObjects = document.querySelectorAll('.object-card:not([style*="opacity: 0.3"])');
            remainingObjects.forEach(obj => {
                obj.draggable = false;
                obj.style.opacity = '0.5';
                obj.style.cursor = 'not-allowed';
            });
        }
        
        function nextRound() {
            setupGame();
        }
        
        // Initialize game
        setupGame();
    </script>
</body>
</html>