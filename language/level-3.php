<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find the Same - Visual Matching Game</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        
        .game-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            margin: 20px auto;
            max-width: 900px;
        }
        
        .game-title {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .reference-card {
            background: linear-gradient(135deg, #ffd89b 0%, #19547b 100%);
            border-radius: 20px;
            padding: 20px;
            margin: 20px auto;
            max-width: 200px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 4px solid #fff;
        }
        
        .reference-display {
            background: white;
            border-radius: 15px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            margin-bottom: 10px;
        }
        
        .reference-label {
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .choice-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 3px solid transparent;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .choice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border-color: #667eea;
        }
        
        .choice-card.correct {
            border-color: #48bb78;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            animation: correctPulse 0.8s ease-in-out;
        }
        
        .choice-card.wrong {
            border-color: #f56565;
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
            animation: wrongShake 0.6s ease-in-out;
        }
        
        .choice-card.disabled {
            pointer-events: none;
            opacity: 0.6;
        }
        
        @keyframes correctPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        @keyframes wrongShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        
        .score-badge {
            background: linear-gradient(135deg, #ffd89b 0%, #19547b 100%);
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1.3rem;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .level-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 1.1rem;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .choices-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 15px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .instruction {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: white;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            margin: 20px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        .control-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 12px 25px;
            margin: 5px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .control-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        .feedback {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            min-height: 40px;
        }
        
        .feedback.success {
            color: #48bb78;
        }
        
        .feedback.error {
            color: #f56565;
        }
        
        .stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px 0;
        }
        
        .stat-item {
            text-align: center;
            margin: 10px;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #666;
            text-transform: uppercase;
        }
        
        .progress-bar-container {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            height: 8px;
            margin: 20px 0;
            overflow: hidden;
        }
        
        .progress-bar {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            height: 100%;
            border-radius: 10px;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="game-container p-4">
            <h1 class="game-title">
                <i class="fas fa-search"></i> Find the Same
            </h1>
            
            <div class="row align-items-center mb-4">
                <div class="col-md-4">
                    <div class="score-badge">
                        <i class="fas fa-star"></i> Score: <span id="score">0</span>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="level-badge">
                        Round <span id="currentRound">1</span> / <span id="totalRounds">10</span>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <button class="control-btn" id="nextBtn" onclick="nextRound()" style="display: none;">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            
            <div class="progress-bar-container">
                <div class="progress-bar" id="progressBar" style="width: 10%"></div>
            </div>
            
            <div class="instruction">
                Look at the item above and click on the matching one below!
            </div>
            
            <!-- Reference Item -->
            <div class="reference-card">
                <div class="reference-display" id="referenceDisplay">
                    <!-- Reference item will be shown here -->
                </div>
                <div class="reference-label">Find this one ↓</div>
            </div>
            
            <div class="feedback" id="feedback"></div>
            
            <!-- Choice Options -->
            <div class="choices-grid" id="choicesGrid">
                <!-- Choice cards will be populated by JavaScript -->
            </div>
            
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-value" id="correct">0</div>
                    <div class="stat-label">Correct</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="attempts">0</div>
                    <div class="stat-label">Attempts</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="accuracy">100%</div>
                    <div class="stat-label">Accuracy</div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <button class="control-btn" onclick="resetGame()">
                    <i class="fas fa-redo"></i> New Game
                </button>
            </div>
        </div>
    </div>

    <script>
        // Game items pool
        const gameItems = [
            { emoji: "🐱", name: "Cat" },
            { emoji: "🐶", name: "Dog" },
            { emoji: "🐸", name: "Frog" },
            { emoji: "🦁", name: "Lion" },
            { emoji: "🐧", name: "Penguin" },
            { emoji: "🦋", name: "Butterfly" },
            { emoji: "🍎", name: "Apple" },
            { emoji: "🍌", name: "Banana" },
            { emoji: "🍓", name: "Strawberry" },
            { emoji: "🍊", name: "Orange" },
            { emoji: "🥕", name: "Carrot" },
            { emoji: "🌽", name: "Corn" },
            { emoji: "🚗", name: "Car" },
            { emoji: "🚲", name: "Bicycle" },
            { emoji: "✈️", name: "Airplane" },
            { emoji: "🚢", name: "Ship" },
            { emoji: "🚀", name: "Rocket" },
            { emoji: "🚂", name: "Train" },
            { emoji: "⭐", name: "Star" },
            { emoji: "🌙", name: "Moon" },
            { emoji: "🌞", name: "Sun" },
            { emoji: "☁️", name: "Cloud" },
            { emoji: "🌈", name: "Rainbow" },
            { emoji: "❄️", name: "Snow" },
            { emoji: "🏀", name: "Basketball" },
            { emoji: "⚽", name: "Soccer" },
            { emoji: "🎾", name: "Tennis" },
            { emoji: "🏈", name: "Football" },
            { emoji: "🎨", name: "Art" },
            { emoji: "🎵", name: "Music" },
            { emoji: "📚", name: "Books" },
            { emoji: "🎮", name: "Games" },
            { emoji: "🌸", name: "Flower" },
            { emoji: "🌳", name: "Tree" },
            { emoji: "🦄", name: "Unicorn" },
            { emoji: "🎪", name: "Circus" }
        ];
        
        let currentRound = 1;
        let totalRounds = 10;
        let score = 0;
        let correctAnswers = 0;
        let totalAttempts = 0;
        let currentTarget = null;
        let gameChoices = [];
        
        function initGame() {
            currentRound = 1;
            score = 0;
            correctAnswers = 0;
            totalAttempts = 0;
            updateStats();
            startNewRound();
        }
        
        function startNewRound() {
            if (currentRound > totalRounds) {
                showGameComplete();
                return;
            }
            
            // Select random target item
            currentTarget = gameItems[Math.floor(Math.random() * gameItems.length)];
            
            // Create choices (3-5 wrong options + 1 correct)
            const numChoices = 4 + Math.floor(Math.random() * 2); // 4-5 choices
            gameChoices = [currentTarget]; // Start with correct answer
            
            // Add wrong choices
            const availableItems = gameItems.filter(item => item.name !== currentTarget.name);
            for (let i = 0; i < numChoices - 1; i++) {
                const randomIndex = Math.floor(Math.random() * availableItems.length);
                gameChoices.push(availableItems[randomIndex]);
                availableItems.splice(randomIndex, 1);
            }
            
            // Shuffle choices
            shuffleArray(gameChoices);
            
            // Display reference and choices
            displayReference();
            displayChoices();
            
            // Update UI
            document.getElementById('currentRound').textContent = currentRound;
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('feedback').textContent = '';
            
            // Update progress bar
            const progress = (currentRound / totalRounds) * 100;
            document.getElementById('progressBar').style.width = progress + '%';
            
            // Enable all choice cards
            document.querySelectorAll('.choice-card').forEach(card => {
                card.classList.remove('disabled', 'correct', 'wrong');
            });
        }
        
        function displayReference() {
            const referenceDisplay = document.getElementById('referenceDisplay');
            referenceDisplay.innerHTML = `<div class="emoji-display">${currentTarget.emoji}</div>`;
        }
        
        function displayChoices() {
            const choicesGrid = document.getElementById('choicesGrid');
            choicesGrid.innerHTML = '';
            
            gameChoices.forEach((choice, index) => {
                const choiceElement = document.createElement('div');
                choiceElement.className = 'choice-card';
                choiceElement.setAttribute('data-index', index);
                choiceElement.onclick = () => selectChoice(index);
                choiceElement.innerHTML = `<div>${choice.emoji}</div>`;
                choicesGrid.appendChild(choiceElement);
            });
        }
        
        function selectChoice(index) {
            const selectedChoice = gameChoices[index];
            const choiceElement = document.querySelector(`[data-index="${index}"]`);
            
            totalAttempts++;
            
            // Disable all cards
            document.querySelectorAll('.choice-card').forEach(card => {
                card.classList.add('disabled');
            });
            
            if (selectedChoice.name === currentTarget.name) {
                // Correct answer
                correctAnswers++;
                score += 10;
                choiceElement.classList.add('correct');
                showFeedback('🎉 Correct! Well done!', 'success');
                
                setTimeout(() => {
                    document.getElementById('nextBtn').style.display = 'inline-block';
                }, 1000);
            } else {
                // Wrong answer
                choiceElement.classList.add('wrong');
                
                // Show the correct answer
                gameChoices.forEach((choice, idx) => {
                    if (choice.name === currentTarget.name) {
                        const correctElement = document.querySelector(`[data-index="${idx}"]`);
                        setTimeout(() => {
                            correctElement.classList.add('correct');
                        }, 500);
                    }
                });
                
                showFeedback('❌ Try to look more carefully next time!', 'error');
                
                setTimeout(() => {
                    document.getElementById('nextBtn').style.display = 'inline-block';
                }, 1500);
            }
            
            updateStats();
        }
        
        function nextRound() {
            currentRound++;
            startNewRound();
        }
        
        function showFeedback(message, type) {
            const feedback = document.getElementById('feedback');
            feedback.textContent = message;
            feedback.className = `feedback ${type}`;
        }
        
        function showGameComplete() {
            const accuracy = totalAttempts > 0 ? Math.round((correctAnswers / totalAttempts) * 100) : 0;
            let emoji = '';
            let message = '';
            
            if (accuracy >= 90) {
                emoji = '🏆';
                message = 'Outstanding! Perfect visual skills!';
            } else if (accuracy >= 75) {
                emoji = '🌟';
                message = 'Excellent work! Great attention to detail!';
            } else if (accuracy >= 60) {
                emoji = '👍';
                message = 'Good job! Keep practicing!';
            } else {
                emoji = '💪';
                message = 'Nice try! Practice makes perfect!';
            }
            
            const feedback = document.getElementById('feedback');
            feedback.innerHTML = `
                <div style="font-size: 3rem; margin-bottom: 15px;">${emoji}</div>
                <div style="font-size: 1.8rem; color: #667eea; margin-bottom: 10px;">Game Complete!</div>
                <div style="font-size: 1.2rem; color: #666;">${message}</div>
                <div style="margin-top: 20px;">
                    <div style="font-size: 1.5rem; color: #48bb78;">Final Score: ${score}</div>
                    <div style="color: #666;">You got ${correctAnswers} out of ${totalAttempts} correct!</div>
                </div>
            `;
            feedback.className = 'feedback';
            
            document.getElementById('choicesGrid').style.display = 'none';
            document.querySelector('.reference-card').style.display = 'none';
        }
        
        function updateStats() {
            document.getElementById('score').textContent = score;
            document.getElementById('correct').textContent = correctAnswers;
            document.getElementById('attempts').textContent = totalAttempts;
            
            const accuracy = totalAttempts > 0 ? Math.round((correctAnswers / totalAttempts) * 100) : 100;
            document.getElementById('accuracy').textContent = accuracy + '%';
        }
        
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }
        
        function resetGame() {
            document.getElementById('choicesGrid').style.display = 'grid';
            document.querySelector('.reference-card').style.display = 'block';
            initGame();
        }
        
        // Start the game when page loads
        window.onload = function() {
            initGame();
        };
    </script>
</body>
</html>