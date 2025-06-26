<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Scale Learning Game</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 50%, #6c5ce7 100%);
            min-height: 100vh;
            padding: 0;
            overflow-x: hidden;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #4a6741 100%);
            padding: 15px 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-center {
            flex: 1;
            text-align: center;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-icon {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 12px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
            min-width: 45px;
            height: 45px;
        }

        .nav-icon:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .nav-icon.active {
            background: rgba(74, 144, 226, 0.3);
            border-color: #4a90e2;
        }

        .header-title {
            color: white;
            font-size: 1.8em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: wiggle 3s ease-in-out infinite;
        }

        .score-level-display {
            display: flex;
            gap: 15px;
        }

        .score-display, .level-display {
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: white;
            font-weight: bold;
            font-size: 1.1em;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 80px;
            justify-content: center;
        }

        .score-display {
            background: rgba(231, 76, 60, 0.2);
            border-color: rgba(231, 76, 60, 0.4);
        }

        .level-display {
            background: rgba(243, 156, 18, 0.2);
            border-color: rgba(243, 156, 18, 0.4);
        }
        
        .game-container {
            max-width: 1200px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            color: #2c3e50;
        }
        
        .instructions {
            text-align: center;
            font-size: 1.6em;
            color: #34495e;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #e8f8ff, #cce7ff);
            padding: 25px;
            border-radius: 15px;
            border-left: 5px solid #3498db;
            font-weight: bold;
        }
        
        .question {
            text-align: center;
            font-size: 2em;
            margin-bottom: 30px;
            font-weight: bold;
            color: #2c3e50;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .balance-container {
            position: relative;
            width: 100%;
            height: 500px;
            margin: 40px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .balance-stand {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 200px;
            background: linear-gradient(135deg, #8b4513, #654321);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .balance-arm {
            position: absolute;
            top: 150px;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 12px;
            background: linear-gradient(135deg, #2c3e50, #34495e);
            border-radius: 6px;
            transform-origin: center center;
            transition: transform 1.5s ease-in-out;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .balance-center {
            position: absolute;
            top: 145px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: #e74c3c;
            border-radius: 50%;
            z-index: 10;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        
        .balance-plate {
            position: absolute;
            top: 100px;
            width: 220px;
            height: 100px;
            background: linear-gradient(135deg, #f39c12, #e67e22);
            border-radius: 15px;
            border: 4px solid #d35400;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            transform-origin: center bottom;
        }
        
        .balance-plate:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 30px rgba(0,0,0,0.3);
            border-color: #3498db;
        }
        
        .balance-plate.clicked {
            opacity: 0.8;
            cursor: not-allowed;
            pointer-events: none;
        }
        
        .balance-plate.correct {
            animation: correctPulse 1s ease-in-out;
            border-color: #28a745;
            box-shadow: 0 0 30px rgba(40, 167, 69, 0.8);
        }
        
        .balance-plate.incorrect {
            animation: errorShake 0.6s ease-in-out;
            border-color: #dc3545;
            box-shadow: 0 0 30px rgba(220, 53, 69, 0.8);
        }
        
        .left-plate {
            left: 40px;
        }
        
        .right-plate {
            right: 40px;
        }
        
        .plate-object {
            font-size: 4em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: float 2s ease-in-out infinite;
            margin: 10px;
        }
        
        .weight-info {
            font-size: 1.2em;
            font-weight: bold;
            color: #2c3e50;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
            margin-top: 8px;
        }
        
        .feedback {
            text-align: center;
            font-size: 1.8em;
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
            animation: successPulse 0.8s ease-in-out;
        }
        
        .feedback.error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border: 3px solid #dc3545;
        }
        
        .next-btn {
            display: block;
            margin: 30px auto;
            padding: 20px 50px;
            font-size: 1.6em;
            background: linear-gradient(135deg, #3498db, #2980b9);
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
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.4);
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            animation: fadeIn 0.3s ease;
        }
        
        .modal-content {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            margin: 10% auto;
            padding: 40px;
            border-radius: 20px;
            width: 80%;
            max-width: 600px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            animation: slideIn 0.3s ease;
            position: relative;
            border: 3px solid #dc3545;
        }
        
        .modal h2 {
            color: #721c24;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        
        .modal p {
            font-size: 1.4em;
            line-height: 1.6;
            margin-bottom: 15px;
            color: #721c24;
            font-weight: bold;
        }
        
        .theory-box {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            padding: 25px;
            border-radius: 15px;
            border-left: 5px solid #dc3545;
            margin: 20px 0;
        }
        
        .close-btn {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1.3em;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        
        .close-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }

        /* Success Modal Styles */
        .success-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            animation: fadeIn 0.3s ease;
        }
        
        .success-modal-content {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            margin: 15% auto;
            padding: 40px;
            border-radius: 20px;
            width: 80%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            animation: successSlideIn 0.5s ease;
            position: relative;
            border: 3px solid #28a745;
        }
        
        .success-modal h2 {
            color: #155724;
            font-size: 2.5em;
            margin-bottom: 20px;
            animation: successBounce 0.8s ease-in-out;
        }
        
        .success-modal p {
            font-size: 1.6em;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #155724;
            font-weight: bold;
        }
        
        .next-round-btn {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            padding: 18px 40px;
            font-size: 1.4em;
            border-radius: 15px;
            cursor: pointer;
            margin: 10px;
            transition: all 0.3s ease;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .next-round-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(40, 167, 69, 0.4);
        }

        @keyframes successSlideIn {
            from { transform: translateY(-100px) scale(0.8); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }

        @keyframes successBounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .header-left, .header-right {
                gap: 10px;
            }
            
            .nav-icon {
                padding: 10px;
                min-width: 40px;
                height: 40px;
                font-size: 1em;
            }
            
            .header-title {
                font-size: 1.5em;
            }
            
            .score-level-display {
                gap: 10px;
            }
            
            .balance-arm {
                width: 400px;
            }
            
            .balance-plate {
                width: 160px;
                height: 80px;
            }
            
            .left-plate {
                left: 20px;
            }
            
            .right-plate {
                right: 20px;
            }
            
            .plate-object {
                font-size: 3em;
            }
            
            .modal-content {
                width: 95%;
                margin: 5% auto;
                padding: 20px;
            }
        }
        
        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(1deg); }
            75% { transform: rotate(-1deg); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        
        @keyframes correctPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        
        @keyframes successPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- Header with Navigation -->
    <div class="header">
        <div class="header-content">
            <div class="header-left">
                <div class="nav-icon" onclick="goBack()" title="Back">
                    ⬅️
                </div>
                <div class="nav-icon" onclick="goHome()" title="Home">
                    🏠
                </div>
                <div class="nav-icon" onclick="tryAgain()" title="Try Again">
                    🔄
                </div>
            </div>
            
            <div class="header-center">
                <h1 class="header-title">⚖️ Weight Scale Learning Game 🍉🍎</h1>
            </div>
            
            <div class="header-right">
                <div class="score-level-display">
                    <div class="score-display">
                        🏆 <span id="score">0</span>
                    </div>
                    <div class="level-display">
                        📊 L<span id="level">1</span>
                    </div>
                </div>
                <div class="nav-icon" onclick="refreshGame()" title="Refresh">
                    🔄
                </div>
                <div class="nav-icon" onclick="openSettings()" title="Settings">
                    ⚙️
                </div>
                <div class="nav-icon" onclick="openAccount()" title="Account">
                    👤
                </div>
            </div>
        </div>
    </div>

    <div class="game-container">
        
        <div class="question" id="question">Which side is heavier?</div>
        
        <div class="balance-container">
            <div class="balance-stand"></div>
            <div class="balance-arm" id="balance-arm"></div>
            <div class="balance-center"></div>
            
            <div class="balance-plate left-plate" id="left-plate" onclick="handlePlateClick('left')">
                <div id="left-object" class="plate-object"></div>
                <div class="weight-info" id="left-weight"></div>
            </div>
            
            <div class="balance-plate right-plate" id="right-plate" onclick="handlePlateClick('right')">
                <div id="right-object" class="plate-object"></div>
                <div class="weight-info" id="right-weight"></div>
            </div>
        </div>
        
        <!-- <div class="feedback" id="feedback"></div> -->
        
    </div>

    <!-- Modal for wrong answers -->
    <div id="theory-modal" class="modal">
        <div class="modal-content">
            <h2>❌ Try Again!</h2>
            <div class="theory-box">
                <p><strong>Oops! That's not correct.</strong></p>
                <p>Don't worry, learning takes practice!</p>
                <p>💡 <strong>Tip:</strong> Look at the weights carefully - heavier objects make their side of the scale go down!</p>
            </div>
            <button class="close-btn" onclick="closeModal()">Try Again! 🔄</button>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal" class="success-modal">
        <div class="success-modal-content">
            <h2>🎉 Excellent! 🎉</h2>
            <p>You found the heavier side!</p>
            <p id="score-display">🏆 Score: <span id="current-score">0</span> Points! 🏆</p>
            <p id="points-earned">✨ +10 Points Earned! ✨</p>
            <button class="next-round-btn" onclick="window.location.href='../advanced_level/test8.php'">Next Round ➡️</button>
        </div>
    </div>

    <script>
        let score = 0;
        let level = 1;
        let gameComplete = false;
        let wrongAnswerCount = 0;
        let heavierSide = '';
        
        const gameScenarios = [
            {
                left: { emoji: '🍉', name: 'Watermelon', weight: '5 kg' },
                right: { emoji: '🍎', name: 'Apple', weight: '0.2 kg' },
                heavier: 'left',
                theory: 'A watermelon weighs about 5 kg, while an apple weighs only 0.2 kg. The watermelon is 25 times heavier than the apple!'
            },
            {
                left: { emoji: '🍎', name: 'Apple', weight: '0.2 kg' },
                right: { emoji: '🍉', name: 'Watermelon', weight: '5 kg' },
                heavier: 'right',
                theory: 'A watermelon weighs about 5 kg, while an apple weighs only 0.2 kg. The watermelon is much heavier!'
            },
            {
                left: { emoji: '🏀', name: 'Basketball', weight: '0.6 kg' },
                right: { emoji: '🍎', name: 'Apple', weight: '0.2 kg' },
                heavier: 'left',
                theory: 'A basketball weighs about 0.6 kg, while an apple weighs 0.2 kg. The basketball is 3 times heavier!'
            },
            {
                left: { emoji: '🍌', name: 'Banana', weight: '0.1 kg' },
                right: { emoji: '🥭', name: 'Mango', weight: '0.5 kg' },
                heavier: 'right',
                theory: 'A mango weighs about 0.5 kg, while a banana weighs only 0.1 kg. The mango is 5 times heavier!'
            },
            {
                left: { emoji: '📚', name: 'Book', weight: '0.5 kg' },
                right: { emoji: '🍊', name: 'Orange', weight: '0.3 kg' },
                heavier: 'left',
                theory: 'A thick book weighs about 0.5 kg, while an orange weighs 0.3 kg. The book is heavier!'
            }
        ];

        // Navigation Functions
        function goBack() {
            alert('🔙 Going back to previous page...');
        }

        function goHome() {
            if (confirm('🏠 Are you sure you want to go home? Your progress will be reset.')) {
                location.reload();
            }
        }

        function tryAgain() {
            if (confirm('🔄 Try this level again?')) {
                setupBalance();
            }
        }

        function refreshGame() {
            if (confirm('🔄 Refresh the entire game? Your progress will be reset.')) {
                score = 0;
                level = 1;
                updateScore();
                updateLevel();
                setupBalance();
            }
        }

        function openSettings() {
            alert('⚙️ Settings menu would open here!\n\n• Sound effects\n• Difficulty level\n• Theme selection\n• Language options');
        }

        function openAccount() {
            alert('👤 Account menu would open here!\n\n• View profile\n• Achievement badges\n• Learning progress\n• Statistics');
        }
        
        function setupBalance() {
            gameComplete = false;
            wrongAnswerCount = 0; 
            
            
            // Get random scenario
            const scenario = gameScenarios[Math.floor(Math.random() * gameScenarios.length)];
            heavierSide = scenario.heavier;
            
            // Set up left side
            document.getElementById('left-object').textContent = scenario.left.emoji;
            document.getElementById('left-weight').textContent = `${scenario.left.name} (${scenario.left.weight})`;
            
            // Set up right side
            document.getElementById('right-object').textContent = scenario.right.emoji;
            document.getElementById('right-weight').textContent = `${scenario.right.name} (${scenario.right.weight})`;
            
            // Store theory for potential modal
            window.currentTheory = scenario.theory;
            
            // Initially show balanced scale
            document.getElementById('balance-arm').style.transform = 'translateX(-50%) rotate(0deg)';
            
            // Reset plates
            document.getElementById('left-plate').classList.remove('clicked', 'correct', 'incorrect');
            document.getElementById('right-plate').classList.remove('clicked', 'correct', 'incorrect');
            
            // Clear feedback
            document.getElementById('feedback').textContent = '';
            document.getElementById('feedback').className = 'feedback';
            document.getElementById('next-btn').classList.remove('show');
        }
        
        function handlePlateClick(side) {
            if (gameComplete) return;
            
            const leftPlate = document.getElementById('left-plate');
            const rightPlate = document.getElementById('right-plate');
            const feedback = document.getElementById('feedback');
            const balanceArm = document.getElementById('balance-arm');
            
            // Disable further clicks
            leftPlate.classList.add('clicked');
            rightPlate.classList.add('clicked');
            
            // Show the correct weight distribution
            setTimeout(() => {
                if (heavierSide === 'left') {
                    balanceArm.style.transform = 'translateX(-50%) rotate(-15deg)';
                } else {
                    balanceArm.style.transform = 'translateX(-50%) rotate(15deg)';
                }
            }, 300);
            
            if (side === heavierSide) {
                // Correct answer
                score += 10;
                const clickedPlate = document.getElementById(`${side}-plate`);
                clickedPlate.classList.add('correct');
                
                // Update score display in success modal
                document.getElementById('current-score').textContent = score;
                
                // Show success modal after animation
                setTimeout(() => {
                    gameComplete = true;
                    showSuccessModal();
                }, 1500);
                
           } else {
                // Wrong answer - increment counter
                wrongAnswerCount++;
                
                const clickedPlate = document.getElementById(`${side}-plate`);
                clickedPlate.classList.add('incorrect');
                
                // Highlight correct plate
                const correctPlate = document.getElementById(`${heavierSide}-plate`);
                setTimeout(() => {
                    correctPlate.classList.add('correct');
                }, 800);
                
                // Check if this is the second wrong answer
                if (wrongAnswerCount >= 2) {
                    // Redirect to lessons page after a short delay
                    setTimeout(() => {
                        window.location.href = '../pre-maths/lessons/level8.php';
                    }, 2000);
                } else {
                    // Show theory modal after a short delay
                    setTimeout(() => {
                        showTheoryModal();
                    }, 1000);
                }
            }

            
            updateScore();
        }
        
        function showSuccessModal() {
            const modal = document.getElementById('success-modal');
            modal.style.display = 'block';
        }
        
        function closeSuccessModal() {
            const modal = document.getElementById('success-modal');
            modal.style.display = 'none';
            nextLevel();
        }
        
        function showTheoryModal() {
            const modal = document.getElementById('theory-modal');
            modal.style.display = 'block';
        }
        
    function closeModal() {
    const modal = document.getElementById('theory-modal');
    modal.style.display = 'none';
    
    // Generate a new question instead of reloading the page
    setTimeout(() => {
        setupBalance();
    }, 500);
}
        
        function nextLevel() {
            level++;
            
            // Reset UI
            document.getElementById('feedback').textContent = '';
            document.getElementById('feedback').className = 'feedback';
            document.getElementById('next-btn').classList.remove('show');
            
            updateLevel();
            setupBalance();
        }
        
        function updateScore() {
            document.getElementById('score').textContent = score;
        }
        
        function updateLevel() {
            document.getElementById('level').textContent = level;
        }
        
        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const theoryModal = document.getElementById('theory-modal');
            const successModal = document.getElementById('success-modal');
            if (event.target === theoryModal) {
                closeModal();
            }
            if (event.target === successModal) {
                closeSuccessModal();
            }
        }
        
        // Initialize game
        updateScore();
        updateLevel();
        setupBalance();
    </script>
</body>
</html>