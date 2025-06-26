// Score management system
const ScoreManager = {
    // Initialize or get existing scores
    init() {
        if (!localStorage.getItem('activityScores')) {
            localStorage.setItem('activityScores', JSON.stringify({}));
        }
    },

    // Add score for a specific activity
    addScore(activityNumber) {
        const scores = JSON.parse(localStorage.getItem('activityScores'));
        scores[`activity${activityNumber}`] = 1;
        localStorage.setItem('activityScores', JSON.stringify(scores));
        
        // Check if this was the 10th activity
        if (this.getTotalScore() === 10) {
            this.showCongratulations();
        }
    },

    // Get total score
    getTotalScore() {
        const scores = JSON.parse(localStorage.getItem('activityScores'));
        return Object.values(scores).reduce((sum, score) => sum + score, 0);
    },

    // Show congratulatory message
    showCongratulations() {
        const totalScore = this.getTotalScore();
        const message = `
            <div class="congrats-popup">
                <h2>🎉 Congratulations! 🎉</h2>
                <p>You've completed all activities!</p>
                <p>Your total score: ${totalScore}/10</p>
                <button onclick="this.parentElement.remove()">Close</button>
            </div>
        `;
        
        const popup = document.createElement('div');
        popup.innerHTML = message;
        document.body.appendChild(popup.firstElementChild);
    },

    // Reset all scores
    resetScores() {
        localStorage.setItem('activityScores', JSON.stringify({}));
    }
};

// Initialize score manager when the script loads
ScoreManager.init(); 