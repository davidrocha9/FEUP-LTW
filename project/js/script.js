var commentForm = document.querySelector(".addcomment");

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function submitForm(event){
    event.preventDefault();

    console.log("boas");

    var comment = document.querySelector('.addcomment form textarea').value;
    var username = document.querySelector('form input[name="username"]').value;
    var animalID = document.querySelector('form input[name="animalid"]').value;
    var lastcomments = document.querySelectorAll('#comments input[name="lastcommentid"]');
    var comments = document.querySelectorAll('#comments input[name="commentid"]');

    var lastcommentID = parseInt(lastcomments[lastcomments.length - 1].value) + 1;
    var commentID = parseInt(comments[lastcomments.length - 1].value) + 1;

    let request = new XMLHttpRequest();
    request.onload = receiveComments;
    request.open('post', '../api/api_add_comment.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({lastcommentID: lastcommentID, commentID: commentID, username: username, comment: comment, animalID: animalID}));
}

function receiveComments() {
    var response = JSON.parse(this.responseText);
    var comments = document.querySelector("#comments");

    var lastcomments = document.querySelectorAll('#comments input[name="lastcommentid"]');
    var lastcommentID = parseInt(lastcomments[lastcomments.length - 1].value) + 1;
    var currentcomment = document.querySelectorAll('#comments input[name="commentid"]');
    var currentcommentID = parseInt(currentcomment[currentcomment.length - 1].value) + 1;

    var commentsCounter = comments.querySelector("h1");

    response.forEach( function(comment) {
        const username = comment['username'];
        const text = comment['text'];
        const firstname = comment['firstname'];
        const lastname = comment['lastname'];
        const pictitle = comment['title'];

        let new_comment = document.createElement('div');
        new_comment.setAttribute('class', 'comment')
        
        let newArticle = document.createElement('article');

        let newPicture = document.createElement('div');
        newPicture.setAttribute('class', 'userpicture');

        let newImg = document.createElement('img');
        newImg.setAttribute('alt', 'animalpicture');
        newImg.setAttribute('src', pictitle);

        newPicture.append(newImg);
        newArticle.append(newPicture);

        let newCommentedAndPostedBy = document.createElement('div');
        newCommentedAndPostedBy.setAttribute('class', 'commentedandpostedby');
        
        let newText = document.createElement('div');
        newText.setAttribute('class', 'text');

        let newTextP = document.createElement('p');
        newTextP.innerText = text;

        newText.append(newTextP);

        let newPostedBy = document.createElement('div');
        newPostedBy.setAttribute('class', 'postedby');

        let newCommenterName = document.createElement('div');
        newCommenterName.setAttribute('class', 'commentername');
        newCommenterName.innerText = firstname + " " + lastname;

        let newCommenterUserName = document.createElement('div');
        newCommenterUserName.setAttribute('class', 'commenterusername');
        newCommenterUserName.innerText = "(@" + username + ")";

        newPostedBy.append(newCommenterName);
        newPostedBy.append(newCommenterUserName);
        newCommentedAndPostedBy.append(newPostedBy);    
        newCommentedAndPostedBy.append(newText);    

        let newLastCommentID = document.createElement('input');
        newLastCommentID.setAttribute('type', 'hidden');
        newLastCommentID.setAttribute('name', 'lastcommentid');
        newLastCommentID.setAttribute('value', lastcommentID);
        let newCommentID = document.createElement('input');
        newCommentID.setAttribute('type', 'hidden');
        newCommentID.setAttribute('name', 'commentid');
        newCommentID.setAttribute('value', currentcommentID);

        newArticle.append(newCommentedAndPostedBy);

        new_comment.append(newArticle);
        
        let newDivisor = document.createElement('div');
        newDivisor.setAttribute('class', 'divisor');
        
        comments.appendChild(new_comment);
        comments.appendChild(newLastCommentID);
        comments.appendChild(newCommentID);
        comments.appendChild(newDivisor);


        articles = document.querySelectorAll("#comments article");
        commentsCounter.innerText = "" + articles.length + " Comments";
    })

    console.log(comments);
}

commentForm.addEventListener("submit", submitForm);
