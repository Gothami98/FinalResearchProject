<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Video Player</title>
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
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="video-container">
                    <div class="video-info">
                        <h1 class="video-title">YouTube Video Player</h1>
                        <p class="video-description">Educational video content from YouTube</p>
                    </div>

                    <div class="main-content">
                        <div class="video-section">
                            <div class="video-player" id="videoPlayer">
                                <iframe id="youtubePlayer" 
                                        width="100%" 
                                        height="400" 
                                        src="https://www.youtube.com/embed/HlA2YcsSeds?rel=0&modestbranding=1&controls=1&enablejsapi=1" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        referrerpolicy="strict-origin-when-cross-origin"
                                        allowfullscreen
                                        style="border-radius: 15px;">
                                </iframe>
                            </div>
                        </div>
<!-- https://youtu.be/OtigY6XCE7U?si=1JAfY-T1YHPkrX40 -->
                        <div class="playlist-section">
                            <div class="playlist" id="playlist">
                                <h5 class="mb-3"><i class="fas fa-list me-2"></i>Video Playlist</h5>
                                <div id="playlistItems">
                                    <div class="playlist-item active" data-src="HlA2YcsSeds" data-index="0">
                                        <div class="playlist-thumbnail">
                                            <i class="fab fa-youtube text-danger"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">Introduction Video</div>
                                            <small class="text-muted">YouTube • Educational</small>
                                        </div>
                                    </div>
                                    <div class="playlist-item" data-src="MMV5YedWmMo" data-index="1">
                                        <div class="playlist-thumbnail">
                                            <i class="fab fa-youtube text-danger"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">Math Lesson 1</div>
                                            <small class="text-muted">YouTube • Mathematics</small>
                                        </div>
                                    </div>
                                    <!-- <div class="playlist-item" data-src="dQw4w9WgXcQ" data-index="2">
                                        <div class="playlist-thumbnail">
                                            <i class="fab fa-youtube text-danger"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">Sample Video</div>
                                            <small class="text-muted">YouTube • Example</small>
                                        </div>
                                    </div> -->
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
        class YouTubePlayer {
            constructor() {
                this.youtubePlayer = document.getElementById('youtubePlayer');
                this.playlist = document.getElementById('playlist');
                this.playlistItems = document.getElementById('playlistItems');
                
                this.currentIndex = 0;
                this.playlistData = [
                    { src: 'HlA2YcsSeds', title: 'Introduction Video' },
                    { src: 'MMV5YedWmMo', title: 'Math Lesson 1' },
                    { src: 'dQw4w9WgXcQ', title: 'Sample Video' }
                ];
                
                this.init();
            }

            init() {
                this.setupPlaylist();
            }

            setupPlaylist() {
                const playlistItems = this.playlistItems.querySelectorAll('.playlist-item');
                playlistItems.forEach(item => {
                    item.addEventListener('click', () => {
                        const src = item.dataset.src;
                        const index = parseInt(item.dataset.index);
                        
                        // Remove active class from all items
                        playlistItems.forEach(i => i.classList.remove('active'));
                        // Add active class to clicked item
                        item.classList.add('active');
                        
                        this.currentIndex = index;
                        this.playYouTubeVideo(src);
                    });
                });
            }

            playYouTubeVideo(videoId) {
                // Add autoplay parameter for automatic playback
                this.youtubePlayer.src = `https://www.youtube.com/embed/${videoId}?rel=0&modestbranding=1&controls=1&autoplay=1&enablejsapi=1`;
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
                    this.playYouTubeVideo(nextItem.src);
                }
            }
        }

        // Initialize the YouTube player
        document.addEventListener('DOMContentLoaded', () => {
            const player = new YouTubePlayer();
        });
    </script>
</body>
</html>