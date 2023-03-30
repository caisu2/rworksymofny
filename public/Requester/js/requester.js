function Requester() {
  self = this;

  self.loadList = () => {
    if ($(".div-directory-content").length)
      $(".div-directory-content").remove();

    $(".div-loader").html(createHtmlLoader());
    $(".div-loader").show();

    try {
      var url = self.base_url + "list";

      $.ajax({
        url: url,
        type: "GET",
        async: true,
        dataType: "json",
        data: {},
        success: function (response) {
          //hide loader...
          $(".div-loader").html();
          $(".div-loader").hide();
          //intented for change page in pagination...
          if ($(".div-directory-content").length)
            $(".div-directory-content").remove();
          $(".div-list").html(response);
          $("#tbl-directory-worker").DataTable();
        },
        failure: function (response) {},
      });
    } catch (error) {
      console.log(error);
    }
  };

  self.delete = (requester_id) => {
    const prompt_text =
      "<center>Are you sure you want delete this requester?</center>";
    $(".div-global-modal").html(prompt_text);
    let dialog = $(".div-global-modal")
      .dialog({
        autoOpen: false,
        width: 350,
        height: 210,
        modal: true,
        resizable: false,
        draggable: false,
        title: "Delete Requester",
        buttons: [
          {
            id: "btn-cancel-delete-worker",
            class: "button--primary",
            text: "Cancel",
            click: function () {
              $(this).dialog("close");
            },
            icons: { primary: "ui-icon-closethick" },
          },
          {
            id: "btn-ok-delete-worker",
            class: "button--primary",
            text: "Delete",
            click: function () {
              $(this).dialog("close");
              try {
                var url = self.base_url + "delete?id=" + requester_id;

                $.ajax({
                  url: url,
                  type: "GET",
                  async: true,
                  dataType: "json",
                  data: {},
                  success: function (response) {
                    self.loadList();
                  },
                  failure: function (response) {},
                });
              } catch (error) {
                console.log(error);
              }
            },
            icons: { primary: "ui-icon-trash" },
          },
        ],
      })
      .dialog("open");
    dialog.closest(".ui-dialog").find(".ui-dialog-titlebar-close").hide();
  };

  self.deny = (requester_id) => {
    const prompt_text =
      "<center>Are you sure you want deny this requester?</center>";
    $(".div-global-modal").html(prompt_text);
    let dialog = $(".div-global-modal")
      .dialog({
        autoOpen: false,
        width: 350,
        height: 210,
        modal: true,
        resizable: false,
        draggable: false,
        title: "Deny Requester",
        buttons: [
          {
            id: "btn-cancel-deny-worker",
            class: "button--primary",
            text: "Cancel",
            click: function () {
              $(this).dialog("close");
            },
            icons: { primary: "ui-icon-closethick" },
          },
          {
            id: "btn-ok-deny-worker",
            class: "button--primary",
            text: "Deny",
            click: function () {
              $(this).dialog("close");
              try {
                var url = self.base_url + "deny?id=" + requester_id;

                $.ajax({
                  url: url,
                  type: "GET",
                  async: true,
                  dataType: "json",
                  data: {},
                  success: function (response) {
                    self.loadList();
                  },
                  failure: function (response) {},
                });
              } catch (error) {
                console.log(error);
              }
            },
            icons: { primary: "ui-icon-check" },
          },
        ],
      })
      .dialog("open");
    dialog.closest(".ui-dialog").find(".ui-dialog-titlebar-close").hide();
  };

  self.onSave = () => {
    const data = $("#requester-form").serialize();

    try {
      var url = self.base_url + "save";

      $.ajax({
        url: url,
        type: "POST",
        async: true,
        dataType: "json",
        data: data,
        success: function (response) {
          self.loadList();
        },
        failure: function (response) {},
      });
    } catch (error) {
      console.log(error);
    }
  };
}

$(function () {
  requester.loadList();

  $("#div-workers-directory").on("click", ".requester-delete", function (e) {
    e.preventDefault();
    const requester_id = $(this).attr("data-id");
    requester.delete(requester_id);
  });

  $("#div-workers-directory").on("click", ".requester-deny", function (e) {
    e.preventDefault();
    const requester_id = $(this).attr("data-id");
    requester.deny(requester_id);
  });

  $(".requester_save").on("click", function (e) {
    e.preventDefault();
    requester.onSave();
  });
});

function createHtmlLoader() {
  let html = "";
  html += '<div class="ds-loader">';
  html += '   <div class="ds-loader__group">';
  html += '       <div class="ds-loader__strip"></div>';
  html += '       <div class="ds-loader__strip"></div>';
  html += '       <div class="ds-loader__strip"></div>';
  html += "   </div>";
  html += "   <span>Loading ...</span>";
  html += "</div>";

  return html;
}
