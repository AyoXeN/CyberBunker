function toggleNewPostForm() {
    var newPostForm = document.getElementById('newPostForm');
    newPostForm.style.display = newPostForm.style.display === 'none' ? 'block' : 'none';
}

function addNewPost() {
    var title = document.getElementById('postTitle').value;
    var content = document.getElementById('postContent').value;

    if (title && content) {
        var blogPosts = document.getElementById('blogPosts');

        var postDiv = document.createElement('div');
        postDiv.classList.add('blog-post');

        var titleHeading = document.createElement('h3');
        titleHeading.textContent = title;

        var contentParagraph = document.createElement('p');
        contentParagraph.textContent = content;

        postDiv.appendChild(titleHeading);
        postDiv.appendChild(contentParagraph);

        blogPosts.appendChild(postDiv);

        // Clear the form
        document.getElementById('postTitle').value = '';
        document.getElementById('postContent').value = '';

        // Hide the form after adding a new post
        toggleNewPostForm();
    } else {
        alert('Please enter both title and content for the new post.');
    }
}