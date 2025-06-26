<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fun Learning Videos!</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One:wght@400&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(45deg, #ff9a9e 0%, #fecfef 25%, #fecfef 50%, #fad0c4 75%, #a8edea 100%);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
            padding: 20px 0;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .main-container {
            background: white;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px;
            position: relative;
            overflow: hidden;
        }

        .main-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .main-title {
            font-family: 'Fredoka One', cursive;
            font-size: 3rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 3s ease infinite;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .subtitle {
            font-size: 1.3rem;
            color: #666;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .fun-icons {
            font-size: 2rem;
            margin: 0 15px;
            animation: bounce 2s infinite;
        }

        .fun-icons:nth-child(1) { animation-delay: 0s; color: #ff6b6b; }
        .fun-icons:nth-child(2) { animation-delay: 0.2s; color: #4ecdc4; }
        .fun-icons:nth-child(3) { animation-delay: 0.4s; color: #45b7d1; }
        .fun-icons:nth-child(4) { animation-delay: 0.6s; color: #96ceb4; }
        .fun-icons:nth-child(5) { animation-delay: 0.8s; color: #feca57; }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .video-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 25px;
            padding: 25px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .video-section::before {
            content: '🌟✨🎈🎨🎵';
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.2rem;
            opacity: 0.3;
            letter-spacing: 5px;
        }

        .video-player {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            background: white;
            padding: 5px;
        }

        .video-player:hover {
            transform: scale(1.02);
        }

        .video-player iframe {
            width: 100%;
            min-height: 500px;
            border-radius: 15px;
            border: none;
        }

        @media (max-width: 768px) {
            .video-player iframe {
                min-height: 300px;
            }
            .main-title {
                font-size: 2rem;
            }
        }

        .start-btn {
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            border: none;
            border-radius: 50px;
            padding: 20px 40px;
            color: white;
            font-size: 1.4rem;
            font-weight: 800;
            font-family: 'Fredoka One', cursive;
            margin: 20px 0;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.4);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-block;
        }

        .start-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .start-btn:hover::before {
            left: 100%;
        }

        .start-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(255, 107, 107, 0.6);
            color: white;
            text-decoration: none;
        }

        .start-btn:active {
            transform: translateY(-2px) scale(1.02);
        }

        .playlist-section {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            border-radius: 25px;
            padding: 25px;
            position: relative;
        }

        .playlist-title {
            font-family: 'Fredoka One', cursive;
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .playlist-item {
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .playlist-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .playlist-item > * {
            position: relative;
            z-index: 2;
        }

        .playlist-item:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .playlist-item:hover::before {
            opacity: 0.1;
        }

        .playlist-item.active {
            border-color: #ff6b6b;
            background: linear-gradient(135deg, #ff6b6b, #feca57);
            color: white;
            transform: translateY(-5px);
        }

        .playlist-item.active::before {
            opacity: 0;
        }

        .playlist-thumbnail {
            width: 80px;
            height: 60px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-right: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .playlist-info {
            flex: 1;
        }

        .video-title {
            font-weight: 800;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .video-meta {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .activity-status {
            background: linear-gradient(45deg, #96ceb4, #4ecdc4);
            color: white;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            font-weight: 700;
            font-size: 1.2rem;
            margin: 20px 0;
            display: none;
            position: relative;
            overflow: hidden;
        }

        .activity-status::before {
            content: '🎉🌟🎈';
            position: absolute;
            top: 50%;
            left: -20px;
            transform: translateY(-50%);
            font-size: 1.5rem;
            animation: float 3s ease-in-out infinite;
        }

        .activity-status::after {
            content: '🎨🎵🌈';
            position: absolute;
            top: 50%;
            right: -20px;
            transform: translateY(-50%);
            font-size: 1.5rem;
            animation: float 3s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(-50%) translateX(0); }
            50% { transform: translateY(-50%) translateX(10px); }
        }

        .activity-status.show {
            display: block;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { 
                opacity: 0; 
                transform: translateY(20px) scale(0.9); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            align-items: start;
        }

        @media (max-width: 992px) {
            .content-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .main-container {
                margin: 10px;
                padding: 20px;
            }
        }

        /* Fun floating shapes */
        .floating-shape {
            position: fixed;
            pointer-events: none;
            opacity: 0.1;
            z-index: -1;
        }

        .shape-1 {
            top: 10%;
            left: 10%;
            font-size: 3rem;
            color: #ff6b6b;
            animation: float 6s ease-in-out infinite;
        }

        .shape-2 {
            top: 70%;
            right: 10%;
            font-size: 2.5rem;
            color: #4ecdc4;
            animation: float 4s ease-in-out infinite reverse;
        }

        .shape-3 {
            bottom: 20%;
            left: 5%;
            font-size: 2rem;
            color: #feca57;
            animation: float 5s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <!-- Floating decorative shapes -->
    <div class="floating-shape shape-1">🌟</div>
    <div class="floating-shape shape-2">🎈</div>
    <div class="floating-shape shape-3">🎨</div>

    <div class="container-fluid">
        <div class="main-container">
            <div class="header">
                <h1 class="main-title">Fun Learning Time!</h1>
                <div class="subtitle">Let's Learn About Weights! 📏⚖️</div>
                <div>
                    <i class="fas fa-star fun-icons"></i>
                    <i class="fas fa-heart fun-icons"></i>
                    <i class="fas fa-rainbow fun-icons"></i>
                    <i class="fas fa-rocket fun-icons"></i>
                    <i class="fas fa-smile fun-icons"></i>
                </div>
            </div>

            <div class="text-center">
                <div class="activity-status" id="activityStatus">
                    <i class="fas fa-check-circle me-2"></i>Awesome! Let's learn together! 🎉
                </div>
            </div>

            <div class="content-grid">
                <div class="video-section">
                    <div class="video-player" id="videoPlayer">
                        <iframe id="youtubePlayer" 
                                width="100%" 
                                height="500" 
                                src="https://www.youtube.com/embed/58ckl4SaeYQ?rel=0&modestbranding=1&controls=1&enablejsapi=1" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="playlist-section">
                    <h3 class="playlist-title">
                        <i class="fas fa-list-ul me-2"></i>Learning Videos 📺
                    </h3>
                    <div id="playlistItems">
                        <div class="playlist-item active d-flex align-items-center" data-src="58ckl4SaeYQ" data-index="0">
                            <div class="playlist-thumbnail">
                                <i class="fas fa-weight-hanging"></i>
                            </div>
                            <div class="playlist-info">
                                <div class="video-title">Measuring Weight 📏</div>
                                <div class="video-meta">Learn about scales and measuring!</div>
                            </div>
                        </div>
                        <div class="playlist-item d-flex align-items-center" data-src="O1KJ2AqWxqE" data-index="1">
                            <div class="playlist-thumbnail">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <div class="playlist-info">
                                <div class="video-title">Measuring and Comparing </div>
                                <div class="video-meta">Measuring and Comparing Masses Using a Simple Balance</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <a href="../level-8.html" class="start-btn" id="startActivityBtn">
                            <i class="fas fa-play me-2"></i>Let's Start Learning!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        class KidFriendlyYouTubePlayer {
            constructor() {
                this.youtubePlayer = document.getElementById('youtubePlayer');
                this.playlistItems = document.getElementById('playlistItems');
                this.activityStatus = document.getElementById('activityStatus');
                
                this.currentIndex = 0;
                this.playlistData = [
                    { src: '58ckl4SaeYQ', title: 'Measuring Weight', emoji: '📏' },
                    { src: 'O1KJ2AqWxqE', title: 'Measuring and Comparing', emoji: '🔢' }
                ];
                
                this.init();
                this.addFunEffects();
            }

            init() {
                this.setupPlaylist();
            }

            addFunEffects() {
                // Add click effects to buttons
                document.addEventListener('click', (e) => {
                    if (e.target.closest('.playlist-item') || e.target.closest('.start-btn')) {
                        this.createClickEffect(e.clientX, e.clientY);
                    }
                });
            }

            createClickEffect(x, y) {
                const effect = document.createElement('div');
                effect.style.cssText = `
                    position: fixed;
                    left: ${x}px;
                    top: ${y}px;
                    width: 20px;
                    height: 20px;
                    background: radial-gradient(circle, #ff6b6b, transparent);
                    border-radius: 50%;
                    pointer-events: none;
                    z-index: 1000;
                    animation: clickEffect 0.6s ease-out forwards;
                `;
                
                // Add animation keyframes if not already added
                if (!document.querySelector('#clickEffectStyle')) {
                    const style = document.createElement('style');
                    style.id = 'clickEffectStyle';
                    style.textContent = `
                        @keyframes clickEffect {
                            0% { transform: scale(0) translate(-50%, -50%); opacity: 1; }
                            100% { transform: scale(4) translate(-50%, -50%); opacity: 0; }
                        }
                    `;
                    document.head.appendChild(style);
                }
                
                document.body.appendChild(effect);
                setTimeout(() => effect.remove(), 600);
            }

            setupPlaylist() {
                const playlistItems = this.playlistItems.querySelectorAll('.playlist-item');
                playlistItems.forEach(item => {
                    item.addEventListener('click', () => {
                        const src = item.dataset.src;
                        const index = parseInt(item.dataset.index);
                        
                        this.currentIndex = index;
                        this.updateActivePlaylistItem(index);
                        this.playYouTubeVideo(src);
                        
                        // Add fun feedback
                        this.activityStatus.classList.add('show');
                        this.activityStatus.innerHTML = `<i class="fas fa-play-circle me-2"></i>Great choice! Enjoy this video! ${this.playlistData[index].emoji}`;
                    });
                });
            }

            updateActivePlaylistItem(activeIndex) {
                const playlistItems = this.playlistItems.querySelectorAll('.playlist-item');
                playlistItems.forEach((item, index) => {
                    if (index === activeIndex) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });
            }

            playYouTubeVideo(videoId) {
                this.youtubePlayer.src = `https://www.youtube.com/embed/${videoId}?rel=0&modestbranding=1&controls=1&enablejsapi=1`;
            }
        }

        // Initialize the kid-friendly YouTube player
        document.addEventListener('DOMContentLoaded', () => {
            const player = new KidFriendlyYouTubePlayer();
            
            // Add some fun loading animations
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease';
                document.body.style.opacity = '1';
            }, 100);
        });
    </script>
</body>
</html>