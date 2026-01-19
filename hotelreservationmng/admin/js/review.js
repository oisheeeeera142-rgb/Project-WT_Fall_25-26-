document.addEventListener("DOMContentLoaded", () => {
    fetch("../controller/review.php?action=list")
        .then(res => res.json())
        .then(reviews => {
            const container = document.getElementById("reviews");
            reviews.forEach(r => {
                let div = document.createElement("div");
                div.className = "review";
                let name = document.createElement("p");
                name.innerHTML = "<b>" + r.guest_name + "</b> (" + r.rating + ")";
                div.appendChild(name);
                let comment = document.createElement("p");
                comment.textContent = r.comment;
                div.appendChild(comment);
                let status = document.createElement("p");
                status.textContent = "Status: " + r.status;
                div.appendChild(status);
                let approveBtn = document.createElement("button");
                approveBtn.textContent = "Approve";
                approveBtn.onclick = () => approve(r.id);
                div.appendChild(approveBtn);
                let rejectBtn = document.createElement("button");
                rejectBtn.textContent = "Reject";
                rejectBtn.onclick = () => reject(r.id);
                div.appendChild(rejectBtn);
                let textarea = document.createElement("textarea");
                textarea.id = "resp_" + r.id;
                textarea.placeholder = "Write response...";
                div.appendChild(textarea);
                let respondBtn = document.createElement("button");
                respondBtn.textContent = "Respond";
                respondBtn.onclick = () => respond(r.id);
                div.appendChild(respondBtn);
                container.appendChild(div);
            });
        });
});
function approve(id) {
    fetch("../controller/review.php?action=approve&id=" + id)
        .then(() => alert("Approved!"));
}

function reject(id) {
    fetch("../controller/review.php?action=reject&id=" + id)
        .then(() => alert("Rejected!"));
}
function respond(id) {
    let text = document.getElementById("resp_" + id).value;
    fetch("../controller/review.php?action=respond&id=" + id + "&response=" + text)
        .then(() => alert("Response sent!"));
}
