'use strict';
const User=require("./userController");
const express = require('express');
const productsCtrl = require('./ProductsController');
const route = express.Router();
route.post("/login", User.login);
const {checkToken} = require("../../api/auth/token_validation");
route.post("/register",checkToken,User.creatuser);
route.put("/changepass",checkToken, User.changePassword);
route.post("/checkgmail",User.checkgmail);
route.put("/resetpass",checkToken,User.resetpass);
//get
route.get("/book",checkToken,productsCtrl.get)
route.get("/sbook",productsCtrl.get)
route.get("/theloai",checkToken, productsCtrl.gettheloai)
route.get("/taikhoan",checkToken, productsCtrl.gettaikhoan)
route.get("/docgia",checkToken, productsCtrl.getdocgia)
route.get("/the",checkToken, productsCtrl.getthe)
route.get("/nhaxuatban",checkToken, productsCtrl.getnhaxuatban)
route.get("/phieumuon",checkToken, productsCtrl.getphieumuon)
route.get("/ctphieumuon",checkToken, productsCtrl.getctphieumuon)
route.get("/phieutra",checkToken, productsCtrl.getphieutra)
route.get("/ctphieutra",checkToken, productsCtrl.getctphieutra)
route.get("/quydinh", productsCtrl.getquydinh)
route.get("/staff", productsCtrl.getstaff)
route.get("/book/GMBT", productsCtrl.getGMBT)
route.get("/book/KTKH", productsCtrl.getKTKH)
route.get("/book/TT", productsCtrl.getTT)
route.get("/book/VHNC", productsCtrl.getVHNC)
route.get("/book/VHVN", productsCtrl.getVHVN)
route.get("/book/WB", productsCtrl.getWB)
//getdetail
route.get("/book/:MaSach", productsCtrl.detailbook)
route.get("/docgia/:MaDocGia", productsCtrl.detaildocgia)
route.get("/nhaxuatban/:MaNXB", productsCtrl.detailnhaxuatban)
route.get("/phieumuon/:MaPhieuMuon", productsCtrl.detailphieumuon)
route.get("/phieutra/:MaPhieuTra", productsCtrl.detailphieutra)
route.get("/quydinh/:MaQD", productsCtrl.detailquydinh)
route.get("/staff/:maNV", productsCtrl.detailstaff)
route.get("/theloai/:MaTheLoai", productsCtrl.detailtheloai)
route.get("/the/:MaThe", productsCtrl.detailthe)
route.get("/taikhoan/:TK",productsCtrl.detailuser);
//route.get("/book/:MaTheLoai",productsCtrl.kttheloai);
// post
route.post("/book",checkToken,productsCtrl.postbook)
route.post("/theloai",productsCtrl.posttheloai)
route.post("/taikhoan",productsCtrl.posttaikhoan)
route.post("/docgia",checkToken,productsCtrl.postdocgia)
route.post("/the",productsCtrl.postthe)
route.post("/nhaxuatban",checkToken,productsCtrl.postnhaxuatban)
route.post("/phieumuon",checkToken,productsCtrl.postphieumuon)
route.post("/phieutra",checkToken,productsCtrl.postphieutra)
route.post("/quydinh",productsCtrl.postquydinh)
route.post("/staff",productsCtrl.poststaff)
//put
route.put("/book/:MaSach",checkToken, productsCtrl.updatebook)
route.put("/uploads/:MaSach", productsCtrl.updateimage)
route.put("/theloai/:MaTheLoai",checkToken, productsCtrl.updatetheloai)
route.put("/docgia/:MaDocGia",checkToken, productsCtrl.updatedocgia)
route.put("/the/:MaThe",checkToken, productsCtrl.updatethe)
route.put("/nhaxuatban/:MaNXB",checkToken, productsCtrl.updatenhaxuatban)
route.put("/phieumuon/:MaPhieuMuon",checkToken, productsCtrl.updatephieumuon)
route.put("/phieutra/:MaPhieuTra",checkToken, productsCtrl.updatephieutra)
route.put("/quydinh/:MaQD",checkToken, productsCtrl.updatequydinh)
route.put("/staff/:maNV",checkToken, productsCtrl.updatestaff)
route.put("/taikhoan/:MaTK",checkToken, productsCtrl.updatetaikhoan)

//delete
route.delete("/book/delete/:MaSach",checkToken, productsCtrl.deletebook)
route.delete("/theloai/delete/:MaTheLoai",checkToken, productsCtrl.deletetheloai)
route.delete("/docgia/delete/:MaDocGia",checkToken, productsCtrl.deletedocgia)
route.delete("/the/delete/:MaThe", checkToken,productsCtrl.deletethe)
route.delete("/nhaxuatban/delete/:MaNXB",checkToken, productsCtrl.deletenhaxuatban)
route.delete("/phieumuon/delete/:MaPhieuMuon",checkToken, productsCtrl.deletephieumuon)
route.delete("/phieutra/delete/:MaPhieuTra",checkToken, productsCtrl.deletephieutra)
route.delete("/quydinh/delete/:MaQD", checkToken,productsCtrl.deletequydinh)
route.delete("/taikhoan/delete/:MaTK",checkToken, productsCtrl.deletetaikhoan)
route.delete("/staff/delete/:maNV",checkToken, productsCtrl.deletestaff)

module.exports = route;
