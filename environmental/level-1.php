<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morning Magic - Virtual Morning Routine</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 50%, #fd79a8 100%);
            min-height: 100vh;
            padding: 20px;
            overflow-x: hidden;
        }
        
        .game-container {
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            color: #2c3e50;
            min-height: 90vh;
        }
        
        .title {
            text-align: center;
            font-size: 3.5em;
            color: #2c3e50;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: bounce 2s ease-in-out infinite;
        }
        
        .subtitle {
            text-align: center;
            font-size: 1.8em;
            color: #34495e;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            padding: 15px;
            border-radius: 15px;
            border-left: 5px solid #e67e22;
            font-weight: bold;
        }
        
        .stats-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        
        .stat {
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            padding: 15px 25px;
            border-radius: 12px;
            color: white;
        }
        
        .steps {
            background: linear-gradient(135deg, #e17055, #d63031);
        }
        
        .streak {
            background: linear-gradient(135deg, #00b894, #00cec9);
        }
        
        .current-step {
            text-align: center;
            font-size: 2.2em;
            color: #2c3e50;
            margin: 20px 0;
            padding: 20px;
            background: linear-gradient(135deg, #d1f2eb, #a3e4d7);
            border-radius: 15px;
            border: 3px solid #00b894;
            font-weight: bold;
            animation: pulse 2s ease-in-out infinite;
        }
        
        .bedroom-scene {
            position: relative;
            background: linear-gradient(135deg, #e8f4f8, #d1ecf1);
            border-radius: 20px;
            padding: 30px;
            margin: 20px 0;
            min-height: 500px;
            border: 3px solid #74b9ff;
            overflow: hidden;
        }
        
        .routine-item {
            position: absolute;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 4em;
            user-select: none;
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.2));
            animation: float 3s ease-in-out infinite;
        }
        
        .routine-item:hover {
            transform: scale(1.2) rotate(5deg);
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
        }
        
        .routine-item.completed {
            animation: completed 1s ease-in-out;
            filter: drop-shadow(0 0 15px #00b894) grayscale(50%);
            opacity: 0.6;
            pointer-events: none;
        }
        
        .routine-item.correct {
            animation: correctPulse 1s ease-in-out;
            filter: drop-shadow(0 0 20px #00b894);
        }
        
        .routine-item.incorrect {
            animation: shake 0.5s ease-in-out;
            filter: drop-shadow(0 0 20px #e74c3c);
        }
        
        .routine-item.disabled {
            opacity: 0.3;
            pointer-events: none;
            filter: grayscale(100%);
        }
        
        .sequence-display {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        
        .sequence-item {
            width: 80px;
            height: 80px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5em;
            border: 3px solid #bdc3c7;
            background: linear-gradient(135deg, #fff, #f8f9fa);
            transition: all 0.3s ease;
        }
        
        .sequence-item.completed {
            border-color: #00b894;
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            animation: sequenceComplete 0.5s ease-in-out;
        }
        
        .feedback {
            text-align: center;
            font-size: 2.2em;
            margin: 20px 0;
            padding: 20px;
            border-radius: 15px;
            font-weight: bold;
            transition: all 0.5s ease;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .feedback.success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border: 3px solid #28a745;
            animation: successGlow 1s ease-in-out;
        }
        
        .feedback.error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border: 3px solid #dc3545;
            animation: errorShake 0.5s ease-in-out;
        }
        
        .completion-celebration {
            text-align: center;
            font-size: 3em;
            color: #00b894;
            margin: 30px 0;
            padding: 30px;
            background: linear-gradient(135deg, #d1f2eb, #a3e4d7);
            border-radius: 20px;
            border: 3px solid #00b894;
            display: none;
            animation: celebration 2s ease-in-out;
        }
        
        .reset-btn {
            display: block;
            margin: 20px auto;
            padding: 15px 40px;
            font-size: 1.5em;
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        
        .reset-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.4);
        }
        
        @media (max-width: 768px) {
            .title {
                font-size: 2.5em;
            }
            
            .stats-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .routine-item {
                font-size: 3em;
            }
            
            .sequence-display {
                gap: 10px;
            }
            
            .sequence-item {
                width: 60px;
                height: 60px;
                font-size: 2em;
            }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-8px) rotate(2deg); }
            66% { transform: translateY(-4px) rotate(-1deg); }
        }
        
        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(0, 184, 148, 0.3); }
            50% { box-shadow: 0 0 40px rgba(0, 184, 148, 0.6); }
        }
        
        @keyframes completed {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); filter: drop-shadow(0 0 25px #00b894); }
            100% { transform: scale(1); }
        }
        
        @keyframes correctPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); filter: drop-shadow(0 0 25px #00b894); }
            100% { transform: scale(1); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        
        @keyframes sequenceComplete {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        @keyframes successGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(40, 167, 69, 0.3); }
            50% { box-shadow: 0 0 40px rgba(40, 167, 69, 0.6); }
        }
        
        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        @keyframes celebration {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.05) rotate(-2deg); }
            75% { transform: scale(1.05) rotate(2deg); }
        }
    </style>
</head>
<body>
    <div class="game-container">
        <h1 class="title">🌅 Morning Magic! ✨</h1>
        
        <div class="subtitle">
            Click on the morning routine items in the correct order to start your day right!
        </div>
        
        <div class="stats-container">
            <div class="stat steps">Step: <span id="current-step-num">1</span>/4</div>
            <div class="stat streak">Streak: <span id="streak">0</span></div>
        </div>
        
        <div class="current-step" id="current-instruction">
            Click on: Wake up and stretch! 🛏️
        </div>
        
        <div class="sequence-display" id="sequence-display">
            <!-- Sequence items will be generated here -->
        </div>
        
        <div class="bedroom-scene" id="bedroom-scene">
            <!-- Morning routine items will be placed here -->
        </div>
        
        <div class="feedback" id="feedback"></div>
        
        <div class="completion-celebration" id="completion">
            🎉 Fantastic! You've completed your morning routine perfectly! 
            <br>You're ready to have an amazing day! 🌟
        </div>
        
        <button class="reset-btn" onclick="resetGame()">🔄 Start New Morning</button>
    </div>

    <script>
        let currentStepIndex = 0;
        let completedSteps = [];
        let streak = 0;
        let gameComplete = false;
        
        const routine = [
            { id: 'wake', emoji: '🛏️', name: 'Wake up and stretch', instruction: 'Wake up and stretch!' },
            { id: 'brush', emoji: '🪥', name: 'Brush teeth', instruction: 'Brush your teeth!' },
            { id: 'dress', emoji: '👕', name: 'Get dressed', instruction: 'Put on your clothes!' },
            { id: 'breakfast', emoji: '🥞', name: 'Eat breakfast', instruction: 'Have a healthy breakfast!' }
        ];
        
        const itemPositions = [
            { top: '20%', left: '15%' },
            { top: '25%', left: '75%' },
            { top: '45%', left: '25%' },
            { top: '40%', left: '65%' }
        ];
        
        const encouragementMessages = [
            "Great job! Keep going! 🌟",
            "Perfect! You're doing amazing! ⭐",
            "Excellent! What a great morning routine! 🎉",
            "Wonderful! You're building healthy habits! 💪",
            "Fantastic! You're a morning routine superstar! 🚀"
        ];
        
        const errorMessages = [
            "Oops! Let's try the right step first! 😊",
            "Not quite! Check what you need to do next! 🤔",
            "Close! Look at the instruction above! 👆",
            "Almost! Follow the morning routine order! 📝"
        ];
        
        function resetGame() {
            currentStepIndex = 0;
            completedSteps = [];
            gameComplete = false;
            
            setupGame();
            updateDisplay();
        }
        
        function setupGame() {
            const scene = document.getElementById('bedroom-scene');
            scene.innerHTML = '';
            
            // Create routine items
            routine.forEach((item, index) => {
                const element = document.createElement('div');
                element.className = 'routine-item';
                element.id = item.id;
                element.innerHTML = item.emoji;
                element.style.top = itemPositions[index].top;
                element.style.left = itemPositions[index].left;
                element.onclick = () => handleItemClick(item, element);
                
                // Disable all except first item initially
                if (index > 0) {
                    element.classList.add('disabled');
                }
                
                scene.appendChild(element);
            });
            
            // Setup sequence display
            setupSequenceDisplay();
        }
        
        function setupSequenceDisplay() {
            const display = document.getElementById('sequence-display');
            display.innerHTML = '';
            
            routine.forEach((item, index) => {
                const element = document.createElement('div');
                element.className = 'sequence-item';
                element.innerHTML = item.emoji;
                element.id = `seq-${index}`;
                display.appendChild(element);
            });
        }
        
        function handleItemClick(item, element) {
            if (gameComplete) return;
            
            const expectedItem = routine[currentStepIndex];
            
            if (item.id === expectedItem.id) {
                // Correct item clicked
                element.classList.add('correct');
                setTimeout(() => {
                    element.classList.remove('correct');
                    element.classList.add('completed');
                }, 500);
                
                // Update sequence display
                document.getElementById(`seq-${currentStepIndex}`).classList.add('completed');
                
                completedSteps.push(item);
                currentStepIndex++;
                
                showSuccessFeedback();
                
                // Enable next item or complete game
                if (currentStepIndex < routine.length) {
                    // Enable next item
                    const nextItem = document.getElementById(routine[currentStepIndex].id);
                    nextItem.classList.remove('disabled');
                    updateDisplay();
                } else {
                    // Game complete
                    completeGame();
                }
                
            } else {
                // Wrong item clicked
                element.classList.add('incorrect');
                setTimeout(() => {
                    element.classList.remove('incorrect');
                }, 500);
                
                showErrorFeedback();
            }
        }
        
        function showSuccessFeedback() {
            const feedback = document.getElementById('feedback');
            const message = encouragementMessages[Math.floor(Math.random() * encouragementMessages.length)];
            feedback.textContent = message;
            feedback.className = 'feedback success';
            
            setTimeout(() => {
                feedback.textContent = '';
                feedback.className = 'feedback';
            }, 2000);
        }
        
        function showErrorFeedback() {
            const feedback = document.getElementById('feedback');
            const message = errorMessages[Math.floor(Math.random() * errorMessages.length)];
            feedback.textContent = message;
            feedback.className = 'feedback error';
            
            setTimeout(() => {
                feedback.textContent = '';
                feedback.className = 'feedback';
            }, 2000);
        }
        
        function updateDisplay() {
            // Update step counter
            document.getElementById('current-step-num').textContent = currentStepIndex + 1;
            
            // Update current instruction
            if (currentStepIndex < routine.length) {
                const instruction = document.getElementById('current-instruction');
                instruction.textContent = `Click on: ${routine[currentStepIndex].instruction} ${routine[currentStepIndex].emoji}`;
            }
        }
        
        function completeGame() {
            gameComplete = true;
            streak++;
            
            // Show completion
            document.getElementById('completion').style.display = 'block';
            
            // Update streak
            document.getElementById('streak').textContent = streak;
            
            // Hide current instruction
            document.getElementById('current-instruction').textContent = '🎉 Morning routine complete! 🎉';
        }
        
        // Initialize game
        document.addEventListener('DOMContentLoaded', function() {
            resetGame();
        });
    </script>
</body>
</html>