'use strict'

const util = require('util')
const mysql = require('mysql')
const db = require('./db')
const {createTransport}=require("nodemailer");
module.exports={
   /* create: (res, req)=>{
        let data = req.body;
        let sql = 'INSERT INTO user SET ?'
        db.query(sql, [data], (err, response) => {
            if (err) throw err
            res.send({ message: 'Insert success!' })
        });
    }*/
    create: (data, callback)=>{
        db.query(
            'INSERT INTO taikhoan(MaTK, UserName,PassWord,Email) values(?,?,?,?)',
            [
                data.MaTK,
                data.UserName,
                data.PassWord,
                data.Email
            ],
            
                 (error,result,fields) =>{
                    if(error){
                      return  callback(error);
                    }
                    return callback(null,result[0]);
                }
                );
            },
    getUsers: callBack => {
        db.query(
            'select idUser,TKUser,NameUser,Email from user',
            [],
            (error, results, fields) =>{
                if(error){
                    return callBack(error);
                }
                return callBack(null, results);
            }

        );
    },
    getUserByUserId: (MaTK, callBack) =>{
        'select MaTK, UserName from taikhoan where MaTK= ?',
        [MaTK],
        (error, result, fields)=>{
            if(error){
                callBack(error);
            }
            return callBack(null, result[0]);
        }
    },
    updateUser: (data, callBack) => {
        //let MaTK = req.params.MaTK;
        db.query
        ('update taikhoan set PassWord = ? where MaTK =?',
        [
          //  data.MaTK,
            // data.UserName,
            data.new_password,
            data.MaTK                   
        ],
        (error, results, fields) => {
            if(error){
                callBack(error);
            }
            return callBack(null, results[0]);
        }
        )

    },
    updateUser1: (data, id,callBack) => {
        //let MaTK = req.params.MaTK;
        db.query
        ('update taikhoan set PassWord = ? where MaTK =?',
        [
          //  data.MaTK,
            // data.UserName,
            data,
            id                  
        ],
        (error, results, fields) => {
            if(error){
                callBack(error);
            }
            return callBack(null, results[0]);
        }
        )

    },
    getUserByUserTKUser: (UserName, callBack)=>{
        db.query(
            'select * from taikhoan where UserName=?',
            [UserName],
            (error, results, fields)=>{
                if(error){
                    callBack(error);
                }
                return callBack(null, results[0]);
            }
        )
    },
    sendEmail:(email,token)=>{

        var email = email;
        var token = token;
        var mail = createTransport({
            service: 'gmail',
            auth: {
                user: 'haubruclee07@gmail.com', // Your email id
                pass: 'phonghaodaula26' // Your password
            }
        });
     
        var mailOptions = {
            from: 'haubruclee07@gmail.com',
            to: email,
            subject: 'Reset Password Link - BookShark',
            html: '<p>You requested for reset password, kindly use this <a href="http://localhost:4000/reset-password?token=' + token + '">link</a> to reset your password</p>'
     
        };
     
        mail.sendMail(mailOptions, function(error, info) {
            if (error) {
                console.log(1)
            } else {
                console.log(0)
            }
        });
    }
    };
//}