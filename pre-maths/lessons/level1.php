<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .video-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            margin: 2rem 0;
        }

        .video-player {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .video-player:hover {
            transform: translateY(-5px);
        }

        .video-player iframe {
            width: 100%;
            min-height: 400px;
            border-radius: 15px;
        }

        @media (max-width: 768px) {
            .video-player iframe {
                min-height: 250px;
            }
        }

        video {
            width: 100%;
            height: auto;
            display: block;
        }

        .custom-controls {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 1rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .video-player:hover .custom-controls {
            transform: translateY(0);
        }

        .progress-container {
            background: rgba(255, 255, 255, 0.3);
            height: 6px;
            border-radius: 3px;
            margin-bottom: 1rem;
            cursor: pointer;
        }

        .progress-bar {
            background: #ff6b6b;
            height: 100%;
            border-radius: 3px;
            width: 0%;
            transition: width 0.1s ease;
        }

        .control-buttons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
        }

        .btn-control {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-control:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #ff6b6b;
            transform: scale(1.1);
        }

        .volume-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .volume-slider {
            width: 80px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            outline: none;
            cursor: pointer;
        }

        .time-display {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .video-info {
            text-align: center;
            margin-bottom: 2rem;
        }

        .video-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .video-description {
            color: #666;
            font-size: 1.1rem;
        }

        .playlist {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 1.5rem;
            height: fit-content;
            max-height: 600px;
            overflow-y: auto;
        }

        .playlist-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.5);
        }

        .playlist-item:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(10px);
        }

        .playlist-item.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .playlist-thumbnail {
            width: 60px;
            height: 40px;
            background: #ddd;
            border-radius: 5px;
            margin-right: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-content {
            display: flex;
            gap: 2rem;
            align-items: flex-start;
        }

        .video-section {
            flex: 2;
        }

        .playlist-section {
            flex: 1;
            min-width: 300px;
        }

        @media (max-width: 992px) {
            .main-content {
                flex-direction: column;
            }
            
            .video-section {
                flex: none;
            }
            
            .playlist-section {
                flex: none;
                min-width: auto;
            }
            
            .video-container {
                padding: 1rem;
                margin: 1rem;
            }
            
            .control-buttons {
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .volume-control {
                order: 3;
                width: 100%;
                justify-content: center;
                margin-top: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="video-container">
                    <div class="video-info">
                        <h1 class="video-title">Pre-Maths Lesson Series</h1>
                        <p class="video-description">Educational video content for mathematics preparation</p>
                    </div>

                    <div class="main-content">
                        <div class="video-section">
                            <div class="video-player" id="videoPlayer">
                                <video id="mainVideo" controls preload="metadata" style="display: block;">
                                    <source src="lesson1.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                
                                <iframe id="youtubePlayer" 
                                        width="100%" 
                                        height="400" 
                                        src="https://www.youtube.com/embed/MMV5YedWmMo?rel=0&modestbranding=1&controls=1&enablejsapi=1" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        referrerpolicy="strict-origin-when-cross-origin"
                                        allowfullscreen
                                        style="display: none; border-radius: 15px;">
                                </iframe>
                                
                                <div class="custom-controls" id="customControls">
                                    <div class="progress-container" id="progressContainer">
                                        <div class="progress-bar" id="progressBar"></div>
                                    </div>
                                    
                                    <div class="control-buttons">
                                        <div class="d-flex align-items-center gap-2">
                                            <button class="btn-control" id="playPauseBtn">
                                                <i class="fas fa-play"></i>
                                            </button>
                                            <button class="btn-control" id="rewindBtn">
                                                <i class="fas fa-backward"></i>
                                            </button>
                                            <button class="btn-control" id="forwardBtn">
                                                <i class="fas fa-forward"></i>
                                            </button>
                                        </div>
                                        
                                        <div class="time-display">
                                            <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
                                        </div>
                                        
                                        <div class="volume-control">
                                            <button class="btn-control" id="muteBtn">
                                                <i class="fas fa-volume-up"></i>
                                            </button>
                                            <input type="range" class="volume-slider" id="volumeSlider" min="0" max="100" value="50">
                                            <button class="btn-control" id="fullscreenBtn">
                                                <i class="fas fa-expand"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="playlist-section">
                            <div class="playlist" id="playlist">
                                <h5 class="mb-3"><i class="fas fa-list me-2"></i>Video Playlist</h5>
                                <div id="playlistItems">
                                    <div class="playlist-item active" data-type="local" data-src="video/premaths/lesson1.mp4" data-index="0">
                                        <div class="playlist-thumbnail">
                                            <i class="fas fa-play"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">Pre-Maths Lesson 1</div>
                                            <small class="text-muted">Local Video • MP4</small>
                                        </div>
                                    </div>
                                    <div class="playlist-item" data-type="youtube" data-src="MMV5YedWmMo" data-index="1">
                                        <div class="playlist-thumbnail">
                                            <i class="fab fa-youtube text-danger"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">YouTube Video</div>
                                            <small class="text-muted">YouTube • Online</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        class VideoPlayer {
            constructor() {
                this.video = document.getElementById('mainVideo');
                this.youtubePlayer = document.getElementById('youtubePlayer');
                this.playPauseBtn = document.getElementById('playPauseBtn');
                this.progressBar = document.getElementById('progressBar');
                this.progressContainer = document.getElementById('progressContainer');
                this.currentTimeSpan = document.getElementById('currentTime');
                this.durationSpan = document.getElementById('duration');
                this.volumeSlider = document.getElementById('volumeSlider');
                this.muteBtn = document.getElementById('muteBtn');
                this.fullscreenBtn = document.getElementById('fullscreenBtn');
                this.rewindBtn = document.getElementById('rewindBtn');
                this.forwardBtn = document.getElementById('forwardBtn');
                this.videoPlayer = document.getElementById('videoPlayer');
                this.playlist = document.getElementById('playlist');
                this.playlistItems = document.getElementById('playlistItems');
                this.customControls = document.getElementById('customControls');
                
                this.currentPlayer = 'local'; // 'local' or 'youtube'
                this.currentIndex = 0;
                this.playlistData = [
                    { type: 'local', src: 'video/premaths/lesson1.mp4', title: 'Pre-Maths Lesson 1' },
                    { type: 'youtube', src: 'MMV5YedWmMo', title: 'YouTube Video' }
                ];
                
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.setupPlaylist();
            }

            initializeLocalVideo() {
                // Set up the local video
                this.video.volume = 0.5;
                this.volumeSlider.value = 50;
                this.showLocalPlayer();
            }

            setupPlaylist() {
                const playlistItems = this.playlistItems.querySelectorAll('.playlist-item');
                playlistItems.forEach(item => {
                    item.addEventListener('click', () => {
                        const type = item.dataset.type;
                        const src = item.dataset.src;
                        const index = parseInt(item.dataset.index);
                        
                        // Remove active class from all items
                        playlistItems.forEach(i => i.classList.remove('active'));
                        // Add active class to clicked item
                        item.classList.add('active');
                        
                        this.currentIndex = index;
                        
                        if (type === 'local') {
                            this.playLocalVideo(src);
                        } else if (type === 'youtube') {
                            this.playYouTubeVideo(src);
                        }
                    });
                });
            }

            playLocalVideo(src) {
                this.currentPlayer = 'local';
                this.video.src = src;
                this.showLocalPlayer();
                this.video.load();
            }

            playYouTubeVideo(videoId) {
                this.currentPlayer = 'youtube';
                // Add autoplay parameter for automatic playback
                this.youtubePlayer.src = `https://www.youtube.com/embed/${videoId}?rel=0&modestbranding=1&controls=1&autoplay=1&enablejsapi=1`;
                this.showYouTubePlayer();
            }

            showLocalPlayer() {
                this.video.style.display = 'block';
                this.youtubePlayer.style.display = 'none';
                this.customControls.style.display = 'block';
            }

            showYouTubePlayer() {
                this.video.style.display = 'none';
                this.youtubePlayer.style.display = 'block';
                this.customControls.style.display = 'none';
            }

            playNext() {
                const nextIndex = this.currentIndex + 1;
                if (nextIndex < this.playlistData.length) {
                    const nextItem = this.playlistData[nextIndex];
                    this.currentIndex = nextIndex;
                    
                    // Update active playlist item
                    const playlistItems = this.playlistItems.querySelectorAll('.playlist-item');
                    playlistItems.forEach((item, index) => {
                        if (index === nextIndex) {
                            item.classList.add('active');
                        } else {
                            item.classList.remove('active');
                        }
                    });
                    
                    // Play next video
                    if (nextItem.type === 'local') {
                        this.playLocalVideo(nextItem.src);
                        this.video.play();
                    } else if (nextItem.type === 'youtube') {
                        this.playYouTubeVideo(nextItem.src);
                    }
                }
            }

            setupEventListeners() {
                // Video controls
                this.playPauseBtn.addEventListener('click', () => this.togglePlayPause());
                this.video.addEventListener('timeupdate', () => this.updateProgress());
                this.video.addEventListener('loadedmetadata', () => this.updateDuration());
                this.progressContainer.addEventListener('click', (e) => this.setProgress(e));
                this.volumeSlider.addEventListener('input', () => this.setVolume());
                this.muteBtn.addEventListener('click', () => this.toggleMute());
                this.fullscreenBtn.addEventListener('click', () => this.toggleFullscreen());
                this.rewindBtn.addEventListener('click', () => this.rewind());
                this.forwardBtn.addEventListener('click', () => this.forward());
                
                // Video events
                this.video.addEventListener('play', () => this.updatePlayButton());
                this.video.addEventListener('pause', () => this.updatePlayButton());
                this.video.addEventListener('ended', () => this.playNext());
            }

            togglePlayPause() {
                if (this.currentPlayer === 'local') {
                    if (this.video.paused) {
                        this.video.play();
                    } else {
                        this.video.pause();
                    }
                }
                // YouTube player controls are handled by YouTube's interface
            }

            updatePlayButton() {
                const icon = this.playPauseBtn.querySelector('i');
                if (this.video.paused) {
                    icon.className = 'fas fa-play';
                } else {
                    icon.className = 'fas fa-pause';
                }
            }

            updateProgress() {
                const progress = (this.video.currentTime / this.video.duration) * 100;
                this.progressBar.style.width = progress + '%';
                this.currentTimeSpan.textContent = this.formatTime(this.video.currentTime);
            }

            updateDuration() {
                this.durationSpan.textContent = this.formatTime(this.video.duration);
            }

            setProgress(e) {
                const rect = this.progressContainer.getBoundingClientRect();
                const pos = (e.clientX - rect.left) / rect.width;
                this.video.currentTime = pos * this.video.duration;
            }

            setVolume() {
                this.video.volume = this.volumeSlider.value / 100;
                this.updateMuteButton();
            }

            toggleMute() {
                this.video.muted = !this.video.muted;
                this.updateMuteButton();
            }

            updateMuteButton() {
                const icon = this.muteBtn.querySelector('i');
                if (this.video.muted || this.video.volume === 0) {
                    icon.className = 'fas fa-volume-mute';
                } else if (this.video.volume < 0.5) {
                    icon.className = 'fas fa-volume-down';
                } else {
                    icon.className = 'fas fa-volume-up';
                }
            }

            toggleFullscreen() {
                if (!document.fullscreenElement) {
                    this.videoPlayer.requestFullscreen();
                } else {
                    document.exitFullscreen();
                }
            }

            rewind() {
                this.video.currentTime = Math.max(0, this.video.currentTime - 10);
            }

            forward() {
                this.video.currentTime = Math.min(this.video.duration, this.video.currentTime + 10);
            }

            formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${minutes}:${secs.toString().padStart(2, '0')}`;
            }
        }

        // Initialize the video player
        document.addEventListener('DOMContentLoaded', () => {
            // Show video player and playlist immediately
            document.getElementById('videoPlayer').style.display = 'block';
            document.getElementById('playlist').style.display = 'block';
            
            // Initialize custom controls
            const player = new VideoPlayer();
            player.initializeLocalVideo();
        });
    </script>
</body>
</html>