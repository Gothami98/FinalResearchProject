<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picture Naming Game</title>
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
            max-width: 800px;
        }
        
        .picture-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border: 3px solid #e9ecef;
        }
        
        .picture-card:hover {
            transform: translateY(-5px);
        }
        
        .picture-placeholder {
            height: 300px;
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            position: relative;
        }
        
        .game-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }
        
        .emoji-fallback {
            font-size: 4rem;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .option-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 15px 25px;
            margin: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            min-width: 150px;
        }
        
        .option-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
        
        .option-btn.correct {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            animation: pulse 0.6s ease-in-out;
        }
        
        .option-btn.incorrect {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            animation: shake 0.6s ease-in-out;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
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
        
        .next-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 12px 30px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .next-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        .feedback {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
        }
        
        .feedback.correct {
            color: #48bb78;
        }
        
        .feedback.incorrect {
            color: #f56565;
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
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="game-container p-4">
            <h1 class="game-title">
                <i class="fas fa-images"></i> Picture Naming Game
            </h1>
            
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <div class="score-badge">
                        <i class="fas fa-star"></i> Score: <span id="score">0</span>/<span id="total">0</span>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <button class="next-btn" id="nextBtn" onclick="nextQuestion()" style="display: none;">
                        Next Question <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="picture-card p-4">
                        <div class="picture-placeholder" id="pictureDisplay">
                            🐱
                        </div>
                        <h3 class="text-center mt-3" style="color: #667eea;">What is this?</h3>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="d-flex flex-column align-items-center">
                        <h4 class="mb-4" style="color: #667eea;">Choose the correct answer:</h4>
                        <div id="optionsContainer" class="d-flex flex-column">
                            <!-- Options will be populated by JavaScript -->
                        </div>
                        <div id="feedback" class="feedback"></div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <button class="btn btn-outline-primary" onclick="resetGame()">
                        <i class="fas fa-redo"></i> Reset Game
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Game data - questions with images and emojis as fallback
        const gameData = [
            {
                picture: "🐱",
                image: "", // Add your image URL here
                correct: "Cat",
                options: ["Cat", "Dog", "Bird", "Fish"]
            },
            {
                picture: "🐶",
                image: "", // Add your image URL here
                correct: "Dog",
                options: ["Cat", "Dog", "Rabbit", "Horse"]
            },
            {
                picture: "👶🎮",
                image: "", // Add your child playing image URL here
                correct: "Child Playing",
                options: ["Child Playing", "Child Sleeping", "Child Eating", "Child Reading"]
            },
            {
                picture: "☕",
                image: "", // Add your coffee image URL here
                correct: "Coffee",
                options: ["Coffee", "Tea", "Juice", "Water"]
            },
            {
                picture: "😴",
                image: "", // Add your sleeping image URL here
                correct: "Sleeping",
                options: ["Sleeping", "Eating", "Running", "Reading"]
            },
            {
                picture: "🎮",
                image: "", // Add your playing image URL here
                correct: "Playing Games",
                options: ["Playing Games", "Working", "Studying", "Cooking"]
            },
            {
                picture: "🍎",
                image: "", // Add your apple image URL here
                correct: "Apple",
                options: ["Apple", "Orange", "Banana", "Grape"]
            },
            {
                picture: "🚗",
                image: "", // Add your car image URL here
                correct: "Car",
                options: ["Car", "Bus", "Train", "Plane"]
            },
            {
                picture: "🌞",
                image: "", // Add your sun image URL here
                correct: "Sun",
                options: ["Sun", "Moon", "Star", "Cloud"]
            },
            {
                picture: "🏠",
                image: "", // Add your house image URL here
                correct: "House",
                options: ["House", "School", "Store", "Hospital"]
            },
            {
                picture: "📚",
                image: "", // Add your book image URL here
                correct: "Reading",
                options: ["Reading", "Writing", "Drawing", "Singing"]
            },
            {
                picture: "🎂",
                image: "", // Add your cake image URL here
                correct: "Birthday Cake",
                options: ["Birthday Cake", "Bread", "Cookie", "Pie"]
            },
            {
                picture: "🌸",
                image: "", // Add your flower image URL here
                correct: "Flower",
                options: ["Flower", "Tree", "Grass", "Leaf"]
            },
            {
                picture: "⚽",
                image: "", // Add your ball image URL here
                correct: "Playing Ball",
                options: ["Playing Ball", "Watching TV", "Swimming", "Dancing"]
            },
            {
                picture: "🍳",
                image: "", // Add your cooking image URL here
                correct: "Cooking",
                options: ["Cooking", "Eating", "Cleaning", "Shopping"]
            },
            {
                picture: "🏃‍♂️",
                image: "", // Add your running image URL here
                correct: "Running",
                options: ["Running", "Walking", "Jumping", "Dancing"]
            },
            {
                picture: "🎵",
                image: "", // Add your music image URL here
                correct: "Listening to Music",
                options: ["Listening to Music", "Watching Movie", "Playing Game", "Reading Book"]
            },
            {
                picture: "🎨",
                image: "", // Add your drawing image URL here
                correct: "Drawing",
                options: ["Drawing", "Writing", "Singing", "Dancing"]
            }
        ];
        
        let currentQuestion = 0;
        let score = 0;
        let answered = false;
        
        // Initialize game
        function initGame() {
            currentQuestion = 0;
            score = 0;
            answered = false;
            shuffleArray(gameData);
            updateScore();
            loadQuestion();
        }
        
        // Shuffle array function
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }
        
        // Load current question
        function loadQuestion() {
            if (currentQuestion >= gameData.length) {
                showGameComplete();
                return;
            }
            
            const current = gameData[currentQuestion];
            answered = false;
            
            // Display picture (image or emoji fallback)
            const pictureDisplay = document.getElementById('pictureDisplay');
            
            if (current.image && current.image.trim() !== '') {
                // Show real image if available
                pictureDisplay.innerHTML = `<img src="${current.image}" alt="${current.correct}" class="game-image">`;
            } else {
                // Show emoji fallback
                pictureDisplay.innerHTML = `<div class="emoji-fallback">${current.picture}</div>`;
            }
            
            // Clear feedback
            document.getElementById('feedback').textContent = '';
            
            // Hide next button
            document.getElementById('nextBtn').style.display = 'none';
            
            // Create shuffled options
            const shuffledOptions = [...current.options];
            shuffleArray(shuffledOptions);
            
            // Generate option buttons
            const optionsContainer = document.getElementById('optionsContainer');
            optionsContainer.innerHTML = '';
            
            shuffledOptions.forEach(option => {
                const button = document.createElement('button');
                button.className = 'option-btn';
                button.textContent = option;
                button.onclick = () => selectOption(option, current.correct);
                optionsContainer.appendChild(button);
            });
        }
        
        // Handle option selection
        function selectOption(selected, correct) {
            if (answered) return;
            
            answered = true;
            const buttons = document.querySelectorAll('.option-btn');
            const feedback = document.getElementById('feedback');
            
            buttons.forEach(button => {
                button.style.pointerEvents = 'none';
                if (button.textContent === correct) {
                    button.classList.add('correct');
                } else if (button.textContent === selected && selected !== correct) {
                    button.classList.add('incorrect');
                }
            });
            
            if (selected === correct) {
                score++;
                feedback.textContent = '🎉 Correct! Well done!';
                feedback.className = 'feedback correct';
                playSound('correct');
            } else {
                feedback.textContent = `❌ Oops! The correct answer is ${correct}`;
                feedback.className = 'feedback incorrect';
                playSound('incorrect');
            }
            
            updateScore();
            
            // Show next button after delay
            setTimeout(() => {
                document.getElementById('nextBtn').style.display = 'inline-block';
            }, 1500);
        }
        
        // Next question
        function nextQuestion() {
            currentQuestion++;
            loadQuestion();
        }
        
        // Update score display
        function updateScore() {
            document.getElementById('score').textContent = score;
            document.getElementById('total').textContent = currentQuestion + 1;
        }
        
        // Show game complete message
        function showGameComplete() {
            const percentage = Math.round((score / gameData.length) * 100);
            let message = '';
            let emoji = '';
            
            if (percentage >= 90) {
                message = 'Excellent work! You\'re a vocabulary champion!';
                emoji = '🏆';
            } else if (percentage >= 70) {
                message = 'Great job! You did really well!';
                emoji = '🌟';
            } else if (percentage >= 50) {
                message = 'Good effort! Keep practicing!';
                emoji = '👍';
            } else {
                message = 'Nice try! Practice makes perfect!';
                emoji = '💪';
            }
            
            document.getElementById('pictureDisplay').innerHTML = `
                <div style="text-align: center;">
                    <div style="font-size: 6rem;">${emoji}</div>
                    <div style="font-size: 2rem; color: #667eea; margin-top: 20px;">Game Complete!</div>
                    <div style="font-size: 1.5rem; color: #666; margin-top: 10px;">Final Score: ${score}/${gameData.length}</div>
                    <div style="font-size: 1.2rem; color: #666; margin-top: 10px;">${percentage}%</div>
                </div>
            `;
            
            document.getElementById('optionsContainer').innerHTML = '';
            document.getElementById('feedback').innerHTML = `<div style="color: #667eea; font-size: 1.3rem;">${message}</div>`;
            document.getElementById('nextBtn').style.display = 'none';
        }
        
        // Reset game
        function resetGame() {
            initGame();
        }
        
        // Play sound feedback (visual feedback for now)
        function playSound(type) {
            // In a real implementation, you could play actual sounds
            // For now, we'll just add visual feedback
            const body = document.body;
            if (type === 'correct') {
                body.style.backgroundColor = '#48bb78';
                setTimeout(() => {
                    body.style.backgroundColor = '';
                }, 200);
            }
        }
        
        // Start the game when page loads
        window.onload = function() {
            initGame();
        };
    </script>
</body>
</html>