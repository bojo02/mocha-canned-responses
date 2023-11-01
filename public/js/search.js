$(".search-input").keyup(
    delay(function (e) {
        if ($(".search-input").val().length <= 3) {
            $(".search-content").html(
                "You have to type at least 4 characters."
            );
        }
        if ($(".search-input").val().length == 0) {
            $(".search-content").html("");
        }
        if ($(".search-input").val().length >= 4) {
            let term = $(".search-input").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "/search/" + term,
                type: "get",
                data: {
                    term: term,
                },
                success: (response) => {
                    if (response.length == 0) {
                        $(".search-content").html("No results found...");

                        return;
                    }

                    $(".search-content").html("Results: " + response.length);

                    response.forEach((element) => {
                        var url = "/response/:response";
                        console.log(element);
                        let name = element["name"];
                        url = url.replace(":response", element["id"]);

                        $(".search-content").append(
                            `
            
              <div class="card mt-1">
                <a style="text-decoration:none; font-size:18px; color:black;" href="` +
                                url +
                                `">
                  <div class="card-body">
                    ` +
                                name +
                                `
                  </div>
                 </a>
              </div>
              `
                        );
                    });
                },
            });
        }
    }, 1000)
);
var myMessage = "";
function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}
function openForm() {
    $("#msg").val(myMessage);

    $("#msg-button-trigger").attr("onclick", "closeForm()");

    $("#myForm").show();
}

function closeForm() {
    myMessage = $("#textvalue").val();

    $("#msg").val("");

    $("#msg-button-trigger").attr("onclick", "openForm()");

    $("#myForm").hide();
}
