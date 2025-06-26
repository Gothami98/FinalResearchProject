<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Night Sky Identification Game</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #0c1445 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Animated stars in background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(2px 2px at 20px 30px, #eee, transparent),
                radial-gradient(2px 2px at 40px 70px, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 90px 40px, #fff, transparent),
                radial-gradient(1px 1px at 130px 80px, rgba(255,255,255,0.6), transparent),
                radial-gradient(2px 2px at 160px 30px, #fff, transparent);
            background-repeat: repeat;
            background-size: 200px 100px;
            animation: twinkle 4s ease-in-out infinite alternate;
            pointer-events: none;
            z-index: 1;
        }
        
        .game-container {
            max-width: 1000px;
            margin: 0 auto;
            background: rgba(25, 25, 50, 0.95);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            color: #ffffff;
            position: relative;
            z-index: 2;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }
        
        .title {
            text-align: center;
            font-size: 3em;
            color: #ffffff;
            margin-bottom: 20px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            animation: glow 3s ease-in-out infinite alternate;
        }
        
        .instructions {
            text-align: center;
            font-size: 1.8em;
            color: #e8e8ff;
            margin-bottom: 30px;
            background: linear-gradient(135deg, rgba(30, 30, 80, 0.8), rgba(50, 50, 100, 0.6));
            padding: 25px;
            border-radius: 15px;
            border-left: 5px solid #4a90e2;
            font-weight: bold;
            box-shadow: 0 0 20px rgba(74, 144, 226, 0.3);
        }
        
        .click-instruction {
            text-align: center;
            font-size: 1.6em;
            color: #fff3cd;
            margin-bottom: 30px;
            background: linear-gradient(135deg, rgba(80, 60, 0, 0.8), rgba(100, 80, 20, 0.6));
            padding: 20px;
            border-radius: 15px;
            border-left: 5px solid #ffd700;
            font-weight: bold;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }
        
        .score-level-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 20px;
        }
        
        .score, .level {
            text-align: center;
            font-size: 1.8em;
            font-weight: bold;
            padding: 20px 30px;
            border-radius: 15px;
            flex: 1;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        
        .score {
            background: linear-gradient(135deg, #4a00e0, #8e2de2);
            color: white;
            border: 2px solid rgba(138, 45, 226, 0.5);
        }
        
        .level {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            border: 2px solid rgba(238, 90, 36, 0.5);
        }
        
        .scene-container {
            background: linear-gradient(135deg, rgba(10, 10, 30, 0.9), rgba(20, 20, 50, 0.8));
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            min-height: 500px;
            position: relative;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
        }
        
        .question {
            text-align: center;
            font-size: 2em;
            margin-bottom: 40px;
            font-weight: bold;
            color: #ffffff;
            background: rgba(30, 30, 70, 0.8);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.1);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        
        .objects-area {
            display: flex;
            justify-content: space-around;
            align-items: center;
            min-height: 300px;
            padding: 20px;
        }
        
        .object {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 4px solid transparent;
            border-radius: 20px;
            padding: 20px;
            animation: objectFloat 3s ease-in-out infinite;
            user-select: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(40, 40, 80, 0.6);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            min-width: 180px;
            min-height: 200px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }
        
        .object:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(255, 255, 255, 0.2);
            border-color: #4a90e2;
            background: rgba(60, 60, 100, 0.8);
        }
        
        .object.clicked {
            opacity: 0.4;
            transform: scale(0.9);
            cursor: not-allowed;
            pointer-events: none;
        }
        
        .object.correct-click {
            animation: correctPulse 0.8s ease-in-out;
            border-color: #28a745;
            box-shadow: 0 0 30px rgba(40, 167, 69, 0.8);
        }
        
        .object.incorrect-click {
            animation: errorShake 0.6s ease-in-out;
            border-color: #dc3545;
            box-shadow: 0 0 30px rgba(220, 53, 69, 0.8);
        }
        
        .object-emoji {
            font-size: 8em;
            margin-bottom: 15px;
            display: block;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
        }
        
        .object-name {
            font-size: 1.5em;
            font-weight: bold;
            color: #ffffff;
            text-align: center;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }
        
        .feedback {
            text-align: center;
            font-size: 2em;
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
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.2), rgba(40, 167, 69, 0.1));
            color: #90ee90;
            border: 3px solid #28a745;
            animation: successPulse 0.8s ease-in-out;
            box-shadow: 0 0 30px rgba(40, 167, 69, 0.5);
        }
        
        .feedback.error {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.2), rgba(220, 53, 69, 0.1));
            color: #ff6b6b;
            border: 3px solid #dc3545;
            animation: errorShake 0.6s ease-in-out;
            box-shadow: 0 0 30px rgba(220, 53, 69, 0.5);
        }
        
        .next-btn {
            display: block;
            margin: 30px auto;
            padding: 20px 50px;
            font-size: 1.6em;
            background: linear-gradient(135deg, #4a90e2, #357abd);
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
            box-shadow: 0 0 20px rgba(74, 144, 226, 0.3);
        }
        
        .next-btn.show {
            opacity: 1;
            visibility: visible;
        }
        
        .next-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(74, 144, 226, 0.6);
        }
        
        .celebration {
            text-align: center;
            font-size: 2.5em;
            margin: 20px 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
        }
        
        .celebration.show {
            opacity: 1;
            visibility: visible;
            animation: celebrate 1.2s ease-in-out;
        }
        
        @media (max-width: 768px) {
            .objects-area {
                flex-direction: column;
                gap: 30px;
            }
            
            .object {
                min-width: 150px;
                min-height: 180px;
            }
            
            .object-emoji {
                font-size: 6em;
            }
            
            .score-level-container {
                flex-direction: column;
            }
            
            .title {
                font-size: 2em;
            }
        }
        
        @keyframes twinkle {
            0% { opacity: 0.3; }
            100% { opacity: 1; }
        }
        
        @keyframes glow {
            0%, 100% { text-shadow: 0 0 20px rgba(255, 255, 255, 0.5); }
            50% { text-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 40px rgba(255, 255, 255, 0.6); }
        }
        
        @keyframes objectFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        
        @keyframes correctPulse {
            0% { transform: scale(1); box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); }
            50% { transform: scale(1.2); box-shadow: 0 0 30px rgba(40, 167, 69, 0.9); }
            100% { transform: scale(1); box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); }
        }
        
        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-15px); }
            75% { transform: translateX(15px); }
        }
        
        @keyframes successPulse {
            0% { transform: scale(1); box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); }
            50% { transform: scale(1.05); box-shadow: 0 0 20px rgba(40, 167, 69, 0.8); }
            100% { transform: scale(1); box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); }
        }
        
        @keyframes celebrate {
            0%, 100% { transform: scale(1) rotate(0deg); }
            25% { transform: scale(1.2) rotate(-3deg); }
            75% { transform: scale(1.2) rotate(3deg); }
        }
    </style>
</head>
<body>
    <div class="game-container">
        <h1 class="title">🌙 Find the Night Sky Object! ⭐</h1>
        
        <div class="instructions">
            Look at the 3 objects below. Click on the object you see in the NIGHT SKY!
        </div>
        
        <div class="click-instruction">
            🌟 Click on the object that belongs in the night sky!
        </div>
        
        <div class="score-level-container">
            <div class="score">Score: <span id="score">0</span></div>
            <div class="level">Level: <span id="level">1</span></div>
        </div>
        
        <div class="scene-container">
            <div class="question" id="question">Which object do you see in the night sky?</div>
            <div class="objects-area" id="objects-area">
                <!-- Objects will be generated here -->
            </div>
        </div>
        
        <div class="feedback" id="feedback"></div>
        <div class="celebration" id="celebration"></div>
        
        <button class="next-btn" id="next-btn" onclick="nextLevel()">Next Level ➡️</button>
    </div>

    <script>
        let score = 0;
        let level = 1;
        let gameComplete = false;
        
        const objects = [
            { name: 'Star', emoji: '⭐', isNightSky: true },
            { name: 'Sun', emoji: '☀️', isNightSky: false },
            { name: 'Cloud', emoji: '☁️', isNightSky: false }
        ];
        
        const successMessages = [
            "🎉 Perfect! Stars shine in the night sky! 🎉",
            "⭐ Excellent! You found the night sky object! ⭐",
            "🌟 Great job! Stars twinkle at night! 🌟",
            "🚀 Fantastic! Stars light up the darkness! 🚀",
            "🏆 Amazing! You know what's in the night sky! 🏆"
        ];
        
        const errorMessages = [
            "🤔 Not quite! Look for what shines at night! 🔍",
            "💭 Good try! Think about what you see when it's dark! 👀",
            "📚 Keep learning! What twinkles in the darkness? 📚",
            "🎯 Almost! Stars come out when the sun goes down! ⭐",
            "💡 Try again! What lights up the night sky? 🌟"
        ];
        
        const completionMessages = [
            "🎊 Amazing! You found the night sky object! 🎊",
            "🌟 Perfect! You're a night sky expert! 🌟",
            "🎉 Fantastic work! Well done! 🎉",
            "🚀 Incredible! You did it! 🚀",
            "⭐ Outstanding! Great job! ⭐"
        ];
        
        function getRandomItem(array) {
            return array[Math.floor(Math.random() * array.length)];
        }
        
        function shuffleArray(array) {
            const shuffled = [...array];
            for (let i = shuffled.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
            }
            return shuffled;
        }
        
        function generateObjects() {
            const objectsArea = document.getElementById('objects-area');
            objectsArea.innerHTML = '';
            
            gameComplete = false;
            
            // Shuffle the objects for random positioning
            const shuffledObjects = shuffleArray(objects);
            
            shuffledObjects.forEach((obj, index) => {
                const objEl = document.createElement('div');
                objEl.className = 'object';
                objEl.id = `object-${index}`;
                objEl.style.animationDelay = (index * 0.2) + 's';
                
                objEl.innerHTML = `
                    <span class="object-emoji">${obj.emoji}</span>
                    <div class="object-name">${obj.name}</div>
                `;
                
                objEl.onclick = () => handleObjectClick(obj, objEl);
                objectsArea.appendChild(objEl);
            });
        }
        
        function handleObjectClick(obj, element) {
            if (gameComplete || element.classList.contains('clicked')) return;
            
            element.classList.add('clicked');
            const feedback = document.getElementById('feedback');
            
            if (obj.isNightSky) {
                // Correct answer
                score += 10;
                element.classList.add('correct-click');
                
                const message = getRandomItem(successMessages);
                feedback.textContent = message;
                feedback.className = 'feedback success';
                
                setTimeout(() => {
                    gameComplete = true;
                    const celebration = document.getElementById('celebration');
                    const completionMsg = getRandomItem(completionMessages);
                    
                    celebration.textContent = completionMsg;
                    celebration.classList.add('show');
                    
                    document.getElementById('next-btn').classList.add('show');
                }, 1000);
                
            } else {
                // Wrong answer
                element.classList.add('incorrect-click');
                
                const message = getRandomItem(errorMessages);
                feedback.textContent = message;
                feedback.className = 'feedback error';
                
                // Allow clicking again after animation
                setTimeout(() => {
                    element.classList.remove('incorrect-click', 'clicked');
                }, 1000);
            }
            
            updateScore();
        }
        
        function nextLevel() {
            level++;
            
            // Reset UI
            document.getElementById('feedback').textContent = '';
            document.getElementById('feedback').className = 'feedback';
            document.getElementById('next-btn').classList.remove('show');
            document.getElementById('celebration').classList.remove('show');
            
            updateLevel();
            generateObjects();
        }
        
        function updateScore() {
            document.getElementById('score').textContent = score;
        }
        
        function updateLevel() {
            document.getElementById('level').textContent = level;
        }
        
        // Initialize game
        updateScore();
        updateLevel();
        generateObjects();
    </script>
</body>
</html>