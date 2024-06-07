document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', async (e) => {
            e.preventDefault();
            const post_id = e.target.dataset.postId;
            const response = await fetch('like_post.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ post_id })
            });
            if (response.ok) {
                e.target.textContent = 'Liked';
            }
        });
    });
});
