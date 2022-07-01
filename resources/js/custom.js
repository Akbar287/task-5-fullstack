/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

const { default: Swal } = require("sweetalert2");

$(".cek-hasil").on("click", function (e) {
    if (e.target.dataset.check === "LULUS") {
        Swal.fire("Selamat", "Selamat kamu lolos dalam seleksi", "success");
    } else if (e.target.dataset.check === "TIDAK LULUS") {
        Swal.fire(
            "Tidak Lolos",
            "Maaf, kamu belum lolos dalam seleksi",
            "error"
        );
    } else {
        Swal.fire({
            title: "",
            text: "",
            icon: "question",
            buttons: true,
        }).then((res) => {
            if (res) {
                Swal.fire("Sukses", {
                    icon: "success",
                });
            }
        });

        Swal.fire({
            title: 'Apply ?',
            text: "Apakah anda ingin mendaftar di jabatan ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Daftar!',
            cancelButtonText: 'Batalkan'
          }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Terdaftar", "Anda Sudah terdaftar", "success")
            }
          })
    }
});

$(".table").dataTable({
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json",
    },
});
$(".del-user").on("click", function (e) {
    Swal.fire({
        title: "Hapus " + e.target.dataset.name + " ?",
        text: "User akan dihapus!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus!",
        cancelButtonText: "Batalkan",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:
                    document.location.origin +
                    "/api" +
                    document.location.pathname,
                type: "post",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    user_id: userId,
                    role_id: roleIdChoosen,
                },
                success: function () {
                    location.reload();
                },
                error: function (err) {
                    Swal.fire("Gagal!", err.responseJSON.message, "error");
                },
            });
        }
    });
});

$(".custom-file-input").on("change", function (e) {
    let name = e.target.value.split("fakepath").pop();
    e.currentTarget.nextElementSibling.innerHTML = name;
});

$("#tambah-peserta").fireModal({
    title: "Tambah Peserta",
    body: $("#modal-tambah-peserta"),
    footerClass: "bg-whitesmoke",
    autoFocus: false,
    onFormSubmit: function (modal, e, form) {
        let form_data = $(e.target).serialize();
        console.log(form_data);

        $.ajax({
            url: document.location.origin + "/api/peserta",
            type: "post",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                nama: $(".tambah-peserta-nama").val(),
                username: $(".tambah-peserta-username").val(),
                password: $(".tambah-peserta-password").val(),
                level: $(".tambah-peserta-level").val(),
            },
            success: async function (data) {
                form.stopProgress();
            },
            error: function () {
                form.stopProgress();
            },
        });

        e.preventDefault();
    },
    shown: function (modal, form) {
        console.log(form);
    },
    buttons: [
        {
            text: "Login",
            submit: true,
            class: "btn btn-primary btn-shadow",
            handler: function (modal) {},
        },
    ],
});
