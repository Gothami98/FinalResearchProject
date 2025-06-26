<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odd One Out - Find the Different Picture</title>
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
        
        .picture-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 3px solid transparent;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            margin: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .picture-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border-color: #667eea;
        }
        
        .picture-card.correct {
            border-color: #48bb78;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            animation: correctPulse 0.8s ease-in-out;
            transform: scale(1.1);
        }
        
        .picture-card.wrong {
            border-color: #f56565;
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
            animation: wrongShake 0.6s ease-in-out;
        }
        
        .picture-card.disabled {
            pointer-events: none;
            opacity: 0.7;
        }
        
        .picture-card.odd-one {
            position: relative;
        }
        
        .picture-card.odd-one::after {
            content: '⭐';
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 1.5rem;
            background: #ffd700;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            opacity: 0;
            animation: starAppear 0.5s ease-in-out 0.5s forwards;
        }
        
        @keyframes correctPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.15); }
            100% { transform: scale(1.1); }
        }
        
        @keyframes wrongShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-15px); }
            75% { transform: translateX(15px); }
        }
        
        @keyframes starAppear {
            0% { opacity: 0; transform: scale(0); }
            100% { opacity: 1; transform: scale(1); }
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
        
        .pictures-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            padding: 20px;
            max-width: 700px;
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
        
        .difficulty-selector {
            text-align: center;
            margin: 20px 0;
        }
        
        .difficulty-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 15px;
            color: white;
            padding: 8px 16px;
            margin: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .difficulty-btn.active {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            transform: scale(1.05);
        }
        
        .hint-box {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            border-radius: 10px;
            padding: 10px;
            margin: 10px 0;
            text-align: center;
            font-weight: bold;
            color: #8b4513;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="game-container p-4">
            <h1 class="game-title">
                <i class="fas fa-search-plus"></i> Odd One Out
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
            
            <div class="difficulty-selector">
                <span style="margin-right: 10px; font-weight: bold;">Difficulty:</span>
                <button class="difficulty-btn active" onclick="setDifficulty('easy')" id="easyBtn">Easy (4 items)</button>
                <button class="difficulty-btn" onclick="setDifficulty('medium')" id="mediumBtn">Medium (6 items)</button>
                <button class="difficulty-btn" onclick="setDifficulty('hard')" id="hardBtn">Hard (8 items)</button>
            </div>
            
            <div class="instruction">
                Find the picture that doesn't belong with the others!
            </div>
            
            <div class="hint-box" id="hintBox" style="display: none;">
                <!-- Hint will appear here -->
            </div>
            
            <div class="feedback" id="feedback"></div>
            
            <!-- Pictures Grid -->
            <div class="pictures-grid" id="picturesGrid">
                <!-- Picture cards will be populated by JavaScript -->
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
                <button class="control-btn" onclick="showHint()" id="hintBtn">
                    <i class="fas fa-lightbulb"></i> Hint
                </button>
                <button class="control-btn" onclick="resetGame()">
                    <i class="fas fa-redo"></i> New Game
                </button>
            </div>
        </div>
    </div>

    <script>
        // Game categories with items that belong together and odd ones out
        const gameCategories = [
            {
                theme: "Animals",
                similar: ["🐱", "🐶", "🐰"],
                different: ["🚗", "✈️", "🚲"], // Vehicles among animals
                hint: "Look for something that's not an animal!"
            },
            {
                theme: "Fruits",
                similar: ["🍎", "🍌", "🍊"],
                different: ["🥕", "🌽", "🥬"], // Vegetables among fruits
                hint: "One of these grows differently from the others!"
            },
            {
                theme: "Vehicles",
                similar: ["🚗", "🚲", "✈️"],
                different: ["🐸", "🦋", "🐧"], // Animals among vehicles
                hint: "One of these is alive!"
            },
            {
                theme: "Weather",
                similar: ["☀️", "🌙", "⭐"],
                different: ["🍎", "🍌", "🥕"], // Food among weather
                hint: "Look for something you can eat!"
            },
            {
                theme: "Sports",
                similar: ["⚽", "🏀", "🎾"],
                different: ["📚", "✏️", "🎨"], // School items among sports
                hint: "Find something you use for learning!"
            },
            {
                theme: "Food",
                similar: ["🍕", "🍔", "🌭"],
                different: ["🚗", "🚲", "✈️"], // Vehicles among food
                hint: "One of these can't be eaten!"
            },
            {
                theme: "Nature",
                similar: ["🌳", "🌸", "🌱"],
                different: ["📱", "💻", "🖥️"], // Technology among nature
                hint: "Look for something electronic!"
            },
            {
                theme: "Colors",
                similar: ["❤️", "💙", "💚"],
                different: ["🔢", "🔤", "🔠"], // Symbols among colors
                hint: "Find the symbol that's not a color!"
            },
            {
                theme: "Shapes",
                similar: ["⭐", "🔵", "🔶"],
                different: ["🐱", "🐶", "🦋"], // Animals among shapes
                hint: "One of these is alive and moves!"
            },
            {
                theme: "Music",
                similar: ["🎵", "🎶", "🎤"],
                different: ["🍎", "🍌", "🍊"], // Fruits among music
                hint: "Look for something you can eat, not hear!"
            },
            {
                theme: "School",
                similar: ["📚", "✏️", "📝"],
                different: ["🎮", "🕹️", "🎯"], // Games among school items
                hint: "Find something you play with, not study with!"
            },
            {
                theme: "Space",
                similar: ["🌟", "🌙", "🪐"],
                different: ["🌊", "🏔️", "🌋"], // Earth features among space
                hint: "Look for something found on Earth!"
            }
        ];
        
        let currentRound = 1;
        let totalRounds = 10;
        let score = 0;
        let correctAnswers = 0;
        let totalAttempts = 0;
        let currentPuzzle = null;
        let difficulty = 'easy'; // easy: 4 items, medium: 6 items, hard: 8 items
        let hintUsed = false;
        
        function initGame() {
            currentRound = 1;
            score = 0;
            correctAnswers = 0;
            totalAttempts = 0;
            updateStats();
            startNewRound();
        }
        
        function setDifficulty(level) {
            difficulty = level;
            document.querySelectorAll('.difficulty-btn').forEach(btn => btn.classList.remove('active'));
            document.getElementById(level + 'Btn').classList.add('active');
            
            if (currentRound === 1 && totalAttempts === 0) {
                startNewRound(); // Refresh current round if no attempts made
            }
        }
        
        function startNewRound() {
            if (currentRound > totalRounds) {
                showGameComplete();
                return;
            }
            
            hintUsed = false;
            
            // Select random category
            const category = gameCategories[Math.floor(Math.random() * gameCategories.length)];
            
            // Determine number of items based on difficulty
            let numItems;
            switch(difficulty) {
                case 'easy': numItems = 4; break;
                case 'medium': numItems = 6; break;
                case 'hard': numItems = 8; break;
            }
            
            // Create puzzle
            currentPuzzle = {
                category: category,
                items: [],
                oddOneIndex: Math.floor(Math.random() * numItems)
            };
            
            // Fill with similar items and one different
            for (let i = 0; i < numItems; i++) {
                if (i === currentPuzzle.oddOneIndex) {
                    // Add a different item
                    const differentItem = category.different[Math.floor(Math.random() * category.different.length)];
                    currentPuzzle.items.push({
                        emoji: differentItem,
                        isOddOne: true
                    });
                } else {
                    // Add a similar item
                    const similarItem = category.similar[Math.floor(Math.random() * category.similar.length)];
                    currentPuzzle.items.push({
                        emoji: similarItem,
                        isOddOne: false
                    });
                }
            }
            
            // Display puzzle
            displayPuzzle();
            
            // Update UI
            document.getElementById('currentRound').textContent = currentRound;
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('feedback').textContent = '';
            document.getElementById('hintBox').style.display = 'none';
            
            // Update progress bar
            const progress = (currentRound / totalRounds) * 100;
            document.getElementById('progressBar').style.width = progress + '%';
            
            // Enable all picture cards
            document.querySelectorAll('.picture-card').forEach(card => {
                card.classList.remove('disabled', 'correct', 'wrong', 'odd-one');
            });
        }
        
        function displayPuzzle() {
            const picturesGrid = document.getElementById('picturesGrid');
            picturesGrid.innerHTML = '';
            
            // Adjust grid columns based on difficulty
            switch(difficulty) {
                case 'easy':
                    picturesGrid.style.gridTemplateColumns = 'repeat(2, 1fr)';
                    break;
                case 'medium':
                    picturesGrid.style.gridTemplateColumns = 'repeat(3, 1fr)';
                    break;
                case 'hard':
                    picturesGrid.style.gridTemplateColumns = 'repeat(4, 1fr)';
                    break;
            }
            
            currentPuzzle.items.forEach((item, index) => {
                const pictureElement = document.createElement('div');
                pictureElement.className = 'picture-card';
                pictureElement.setAttribute('data-index', index);
                pictureElement.onclick = () => selectPicture(index);
                pictureElement.innerHTML = `<div>${item.emoji}</div>`;
                picturesGrid.appendChild(pictureElement);
            });
        }
        
        function selectPicture(index) {
            const selectedItem = currentPuzzle.items[index];
            const pictureElement = document.querySelector(`[data-index="${index}"]`);
            
            totalAttempts++;
            
            // Disable all cards
            document.querySelectorAll('.picture-card').forEach(card => {
                card.classList.add('disabled');
            });
            
            if (selectedItem.isOddOne) {
                // Correct answer
                correctAnswers++;
                let points = 15;
                if (!hintUsed) points += 5; // Bonus for not using hint
                
                score += points;
                pictureElement.classList.add('correct', 'odd-one');
                showFeedback(`🎉 Excellent! You found the odd one! (+${points} points)`, 'success');
                
                setTimeout(() => {
                    document.getElementById('nextBtn').style.display = 'inline-block';
                }, 1200);
            } else {
                // Wrong answer
                pictureElement.classList.add('wrong');
                
                // Show the correct answer
                currentPuzzle.items.forEach((item, idx) => {
                    if (item.isOddOne) {
                        const correctElement = document.querySelector(`[data-index="${idx}"]`);
                        setTimeout(() => {
                            correctElement.classList.add('correct', 'odd-one');
                        }, 800);
                    }
                });
                
                showFeedback('❌ Not quite! The highlighted one was different.', 'error');
                
                setTimeout(() => {
                    document.getElementById('nextBtn').style.display = 'inline-block';
                }, 2000);
            }
            
            updateStats();
        }
        
        function showHint() {
            if (hintUsed) return;
            
            hintUsed = true;
            const hintBox = document.getElementById('hintBox');
            hintBox.textContent = currentPuzzle.category.hint;
            hintBox.style.display = 'block';
            
            document.getElementById('hintBtn').disabled = true;
            document.getElementById('hintBtn').style.opacity = '0.5';
        }
        
        function nextRound() {
            currentRound++;
            document.getElementById('hintBtn').disabled = false;
            document.getElementById('hintBtn').style.opacity = '1';
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
                message = 'Outstanding! You have amazing observation skills!';
            } else if (accuracy >= 75) {
                emoji = '🌟';
                message = 'Excellent work! Great eye for detail!';
            } else if (accuracy >= 60) {
                emoji = '👍';
                message = 'Good job! Keep practicing your observation!';
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
                    <div style="color: #666;">You found ${correctAnswers} out of ${totalAttempts} odd ones!</div>
                    <div style="color: #666; margin-top: 10px;">Difficulty: ${difficulty.charAt(0).toUpperCase() + difficulty.slice(1)}</div>
                </div>
            `;
            feedback.className = 'feedback';
            
            document.getElementById('picturesGrid').style.display = 'none';
        }
        
        function updateStats() {
            document.getElementById('score').textContent = score;
            document.getElementById('correct').textContent = correctAnswers;
            document.getElementById('attempts').textContent = totalAttempts;
            
            const accuracy = totalAttempts > 0 ? Math.round((correctAnswers / totalAttempts) * 100) : 100;
            document.getElementById('accuracy').textContent = accuracy + '%';
        }
        
        function resetGame() {
            document.getElementById('picturesGrid').style.display = 'grid';
            document.getElementById('hintBtn').disabled = false;
            document.getElementById('hintBtn').style.opacity = '1';
            initGame();
        }
        
        // Start the game when page loads
        window.onload = function() {
            initGame();
        };
    </script>
</body>
</html>