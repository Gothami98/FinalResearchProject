<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safety Heroes Game - Visual Edition</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            font-size: 18px;
        }
        
        .game-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            margin: 20px auto;
            max-width: 1000px;
        }
        
        .hero-section {
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 30px;
            text-align: center;
        }
        
        .scenario-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 15px;
            color: white;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .scenario-image {
            width: 100%;
            max-width: 400px;
            height: 250px;
            background: white;
            border-radius: 15px;
            margin: 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            color: #333;
            border: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .choice-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }
        
        .choice-btn {
            border: none;
            border-radius: 15px;
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            min-height: 120px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
        }
        
        .choice-btn:hover:not(:disabled) {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        
        .choice-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        
        .safe-choice {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            color: white;
            border: 4px solid #2dd4bf;
        }
        
        .unsafe-choice {
            background: linear-gradient(45deg, #ffeaa7, #fdcb6e);
            color: #2d3436;
            border: 4px solid #f59e0b;
        }
        
        .choice-icon {
            font-size: 3rem;
            margin-bottom: 10px;
            display: block;
        }
        
        .correct-feedback {
            background: linear-gradient(45deg, #00b894, #00cec9);
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            animation: slideDown 0.5s ease;
            text-align: center;
        }
        
        .incorrect-feedback {
            background: linear-gradient(45deg, #e17055, #d63031);
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            animation: slideDown 0.5s ease;
            text-align: center;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .score-badge {
            background: linear-gradient(45deg, #fd79a8, #fdcb6e);
            color: white;
            padding: 15px 25px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 20px;
            margin: 10px;
        }
        
        .progress-bar {
            height: 12px;
            border-radius: 10px;
            background: linear-gradient(45deg, #74b9ff, #0984e3);
        }
        
        .game-complete {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            margin-top: 20px;
        }
        
        .emoji {
            font-size: 4rem;
            margin: 20px;
            display: inline-block;
        }
        
        .btn-next {
            background: linear-gradient(45deg, #74b9ff, #0984e3);
            border: none;
            color: white;
            padding: 15px 35px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }
        
        .btn-restart {
            background: linear-gradient(45deg, #fd79a8, #fdcb6e);
            border: none;
            color: white;
            padding: 20px 50px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 20px;
            margin-top: 20px;
        }
        
        .scenario-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .scenario-text {
            font-size: 20px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .question-text {
            font-size: 22px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .feedback-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        
        .audio-button {
            background: linear-gradient(45deg, #a29bfe, #6c5ce7);
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 50%;
            margin-left: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="game-container">
            <div class="hero-section">
                <h1><i class="fas fa-shield-alt"></i> Safety Heroes Game <i class="fas fa-shield-alt"></i></h1>
                <p class="lead">Learn to stay safe by choosing the right pictures!</p>
                <div class="d-flex flex-wrap justify-content-center align-items-center mt-3">
                    <div class="score-badge">
                        <i class="fas fa-star"></i> Score: <span id="score">0</span>/<span id="totalQuestions">0</span>
                    </div>
                    <div class="score-badge">
                        <i class="fas fa-trophy"></i> Level <span id="level">1</span>
                    </div>
                </div>
                <div class="progress mt-3">
                    <div class="progress-bar" id="progressBar" style="width: 0%"></div>
                </div>
            </div>
            
            <div class="p-4" id="gameArea">
                <!-- Game content will be inserted here -->
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        class SafetyGame {
            constructor() {
                this.currentQuestion = 0;
                this.score = 0;
                this.gameComplete = false;
                
                this.scenarios = [
                    {
                        situation: "Someone you don't know knocks at your door",
                        image: "🏠🚪👤",
                        choices: [
                            { 
                                text: "Open the door", 
                                icon: "fas fa-door-open", 
                                safe: false,
                                color: "#ff6b6b"
                            },
                            { 
                                text: "Call Mom or Dad", 
                                icon: "fas fa-phone", 
                                safe: true,
                                color: "#4ecdc4"
                            },
                            { 
                                text: "Hide and be quiet", 
                                icon: "fas fa-eye-slash", 
                                safe: false,
                                color: "#fdcb6e"
                            }
                        ],
                        explanation: "Perfect! Always call a grown-up you trust when strangers come to the door!",
                        wrongExplanation: "Remember: Never open the door for strangers. Always get help from a trusted adult!"
                    },
                    {
                        situation: "You want to cross the street",
                        image: "🚦🚸🚗",
                        choices: [
                            { 
                                text: "Run across fast", 
                                icon: "fas fa-running", 
                                safe: false,
                                color: "#ff6b6b"
                            },
                            { 
                                text: "Use the crosswalk and wait for green light", 
                                icon: "fas fa-traffic-light", 
                                safe: true,
                                color: "#4ecdc4"
                            },
                            { 
                                text: "Cross between cars", 
                                icon: "fas fa-car", 
                                safe: false,
                                color: "#fdcb6e"
                            }
                        ],
                        explanation: "Excellent! Always use the crosswalk and wait for the safe signal!",
                        wrongExplanation: "Safety first! Always use crosswalks and wait for the green light!"
                    },
                    {
                        situation: "You hear the fire alarm at home",
                        image: "🔥🚨🏠",
                        choices: [
                            { 
                                text: "Hide under bed", 
                                icon: "fas fa-bed", 
                                safe: false,
                                color: "#ff6b6b"
                            },
                            { 
                                text: "Get out fast and call 911", 
                                icon: "fas fa-running", 
                                safe: true,
                                color: "#4ecdc4"
                            },
                            { 
                                text: "Look for the fire", 
                                icon: "fas fa-search", 
                                safe: false,
                                color: "#fdcb6e"
                            }
                        ],
                        explanation: "Great job! When you hear a fire alarm, get out quickly and call for help!",
                        wrongExplanation: "Fire safety rule: Get out fast when you hear the alarm! Don't hide or look around!"
                    },
                    {
                        situation: "You find colorful pills on the ground",
                        image: "💊🌈⚠️",
                        choices: [
                            { 
                                text: "Try to eat one", 
                                icon: "fas fa-pills", 
                                safe: false,
                                color: "#ff6b6b"
                            },
                            { 
                                text: "Tell a teacher or adult", 
                                icon: "fas fa-user-tie", 
                                safe: true,
                                color: "#4ecdc4"
                            },
                            { 
                                text: "Put them in pocket", 
                                icon: "fas fa-hand-paper", 
                                safe: false,
                                color: "#fdcb6e"
                            }
                        ],
                        explanation: "Smart choice! Always tell a grown-up when you find pills or medicine!",
                        wrongExplanation: "Never touch pills you find! They can make you very sick. Always tell an adult!"
                    },
                    {
                        situation: "Your toy falls in the deep pool",
                        image: "🏊‍♂️🏐💧",
                        choices: [
                            { 
                                text: "Jump in to get it", 
                                icon: "fas fa-swimmer", 
                                safe: false,
                                color: "#ff6b6b"
                            },
                            { 
                                text: "Ask the lifeguard for help", 
                                icon: "fas fa-life-ring", 
                                safe: true,
                                color: "#4ecdc4"
                            },
                            { 
                                text: "Use a stick to get it", 
                                icon: "fas fa-walking-cane", 
                                safe: false,
                                color: "#fdcb6e"
                            }
                        ],
                        explanation: "Perfect! Lifeguards are trained to help safely around water!",
                        wrongExplanation: "Water can be dangerous! Always ask a lifeguard or adult for help!"
                    },
                    {
                        situation: "A stranger offers you candy from their car",
                        image: "🚗🍭👤",
                        choices: [
                            { 
                                text: "Go closer to get candy", 
                                icon: "fas fa-candy-cane", 
                                safe: false,
                                color: "#ff6b6b"
                            },
                            { 
                                text: "Run away and find a safe adult", 
                                icon: "fas fa-running", 
                                safe: true,
                                color: "#4ecdc4"
                            },
                            { 
                                text: "Talk to them through window", 
                                icon: "fas fa-comments", 
                                safe: false,
                                color: "#fdcb6e"
                            }
                        ],
                        explanation: "Excellent! Never go near stranger's cars. Find a safe adult immediately!",
                        wrongExplanation: "Stranger danger! Never go near cars or take things from people you don't know!"
                    },
                    {
                        situation: "You see electrical wires and plugs",
                        image: "⚡🔌⚠️",
                        choices: [
                            { 
                                text: "Touch them carefully", 
                                icon: "fas fa-hand-point-right", 
                                safe: false,
                                color: "#ff6b6b"
                            },
                            { 
                                text: "Ask an adult for help", 
                                icon: "fas fa-user-friends", 
                                safe: true,
                                color: "#4ecdc4"
                            },
                            { 
                                text: "Try to fix them yourself", 
                                icon: "fas fa-tools", 
                                safe: false,
                                color: "#fdcb6e"
                            }
                        ],
                        explanation: "Great thinking! Electricity is dangerous. Adults know how to handle it safely!",
                        wrongExplanation: "Electricity can hurt you! Never touch wires or plugs. Always get adult help!"
                    },
                    {
                        situation: "You see pretty mushrooms in the forest",
                        image: "🍄🌲👀",
                        choices: [
                            { 
                                text: "Pick and taste them", 
                                icon: "fas fa-utensils", 
                                safe: false,
                                color: "#ff6b6b"
                            },
                            { 
                                text: "Don't touch, tell an adult", 
                                icon: "fas fa-exclamation-triangle", 
                                safe: true,
                                color: "#4ecdc4"
                            },
                            { 
                                text: "Smell them first", 
                                icon: "fas fa-nose", 
                                safe: false,
                                color: "#fdcb6e"
                            }
                        ],
                        explanation: "Smart! Wild mushrooms can be poisonous. Never eat things you find outside!",
                        wrongExplanation: "Some mushrooms are poisonous! Never eat or touch wild plants without asking adults!"
                    }
                ];
                
                this.init();
            }
            
            init() {
                this.updateScore();
                this.showQuestion();
            }
            
            updateScore() {
                document.getElementById('score').textContent = this.score;
                document.getElementById('totalQuestions').textContent = this.scenarios.length;
                document.getElementById('level').textContent = Math.floor(this.currentQuestion / 3) + 1;
                
                const progress = (this.currentQuestion / this.scenarios.length) * 100;
                document.getElementById('progressBar').style.width = progress + '%';
            }
            
            showQuestion() {
                if (this.currentQuestion >= this.scenarios.length) {
                    this.showGameComplete();
                    return;
                }
                
                const scenario = this.scenarios[this.currentQuestion];
                const gameArea = document.getElementById('gameArea');
                
                gameArea.innerHTML = `
                    <div class="scenario-card">
                        <div class="scenario-title">
                            <i class="fas fa-exclamation-triangle"></i> Scenario ${this.currentQuestion + 1}
                        </div>
                        
                        <div class="scenario-image">
                            ${scenario.image}
                        </div>
                        
                        <div class="scenario-text">
                            ${scenario.situation}
                        </div>
                        
                        <div class="question-text">
                            <i class="fas fa-question-circle"></i> What should you do? Click the safest choice!
                        </div>
                        
                        <div class="choice-container">
                            ${scenario.choices.map((choice, index) => `
                                <button class="choice-btn ${choice.safe ? 'safe-choice' : 'unsafe-choice'}" 
                                        onclick="game.selectChoice(${index})"
                                        style="border-color: ${choice.color}">
                                    <i class="${choice.icon} choice-icon"></i>
                                    <span>${choice.text}</span>
                                </button>
                            `).join('')}
                        </div>
                        <div id="feedback"></div>
                    </div>
                `;
            }
            
            selectChoice(choiceIndex) {
                const scenario = this.scenarios[this.currentQuestion];
                const choice = scenario.choices[choiceIndex];
                const feedbackDiv = document.getElementById('feedback');
                
                // Disable all buttons
                const buttons = document.querySelectorAll('.choice-btn');
                buttons.forEach(btn => btn.disabled = true);
                
                if (choice.safe) {
                    this.score++;
                    feedbackDiv.innerHTML = `
                        <div class="correct-feedback">
                            <div class="feedback-icon">✅</div>
                            <h4><i class="fas fa-check-circle"></i> Excellent Choice!</h4>
                            <p style="font-size: 20px;">${scenario.explanation}</p>
                            <button class="btn-next" onclick="game.nextQuestion()">
                                <i class="fas fa-arrow-right"></i> Next Scenario
                            </button>
                        </div>
                    `;
                } else {
                    feedbackDiv.innerHTML = `
                        <div class="incorrect-feedback">
                            <div class="feedback-icon">❌</div>
                            <h4><i class="fas fa-lightbulb"></i> Let's Learn!</h4>
                            <p style="font-size: 20px;">${scenario.wrongExplanation}</p>
                            <button class="btn-next" onclick="game.nextQuestion()">
                                <i class="fas fa-arrow-right"></i> Next Scenario
                            </button>
                        </div>
                    `;
                }
                
                this.updateScore();
            }
            
            nextQuestion() {
                this.currentQuestion++;
                this.showQuestion();
            }
            
            showGameComplete() {
                const gameArea = document.getElementById('gameArea');
                const percentage = Math.round((this.score / this.scenarios.length) * 100);
                let message, emoji, badge;
                
                if (percentage >= 80) {
                    message = "Amazing! You're a Safety Hero!";
                    emoji = "🏆🎉🌟";
                    badge = "Safety Champion";
                } else if (percentage >= 60) {
                    message = "Great job! You're learning to stay safe!";
                    emoji = "👏🌟😊";
                    badge = "Safety Student";
                } else {
                    message = "Good effort! Let's practice more!";
                    emoji = "💪📚🎯";
                    badge = "Safety Learner";
                }
                
                gameArea.innerHTML = `
                    <div class="game-complete">
                        <h2>${message}</h2>
                        <div class="emoji">${emoji}</div>
                        <div class="mt-4">
                            <h3>🏅 Your Safety Badge: ${badge} 🏅</h3>
                            <p class="lead" style="font-size: 24px;">You got ${this.score} out of ${this.scenarios.length} questions right!</p>
                            <p style="font-size: 22px;">That's ${percentage}% - Keep learning!</p>
                        </div>
                        <div class="mt-4">
                            <h4>🛡️ Remember these safety rules:</h4>
                            <div style="font-size: 20px; line-height: 2;">
                                <p>📞 Always tell a trusted adult when something seems wrong</p>
                                <p>🚨 Ask for help from trained helpers in emergencies</p>
                                <p>🤔 Think first - is it safe?</p>
                                <p>👨‍👩‍👧‍👦 Stay with people you know and trust</p>
                                <p>📱 Know important numbers like 911</p>
                            </div>
                        </div>
                        <button class="btn-restart" onclick="game.restart()">
                            <i class="fas fa-redo"></i> Play Again
                        </button>
                    </div>
                `;
            }
            
            restart() {
                this.currentQuestion = 0;
                this.score = 0;
                this.gameComplete = false;
                this.init();
            }
        }
        
        // Start the game
        const game = new SafetyGame();
    </script>
</body>
</html>