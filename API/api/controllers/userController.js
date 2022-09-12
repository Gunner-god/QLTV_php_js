
'use strict'
const{create, updateUser,updateUser1,getUserByUserTKUser, getUserByUserId, getUsers}=require("./user.service");
const{genSaltSync, hashSync, compareSync}=require("bcrypt");
const nodemailer=require('nodemailer')
const {sign}=require("jsonwebtoken");
const db = require("./db");
const { type } = require("express/lib/response");
module.exports={
    creatuser: (req,res)=>{
        const body= req.body;
        getUserByUserTKUser(body.UserName, (err, results)=>{
            if(err){
                console.log(err);
            }
            if(results){
                return res.json({
                    success: 0,
                    data:"username already exist"
                });
            }
            if(!results){
        
        const salt = genSaltSync(10);
        body.PassWord=hashSync(body.PassWord, salt);
       // body.MKU(body.MKUser, salt);
        create(body, (err,result)=>{
            if(err){
                console.log(err);
                return res.status(500).json({
                    success: 0,
                    message: "error"
                });
            }
            return res.status(200).json({
                success: 1,
                data: result
            });
        });
    }
})},
    getUserByUserId:(req, res)=>{
        const idUser =req.params.idUser;
        getUserByUserId(idUser,(err, results)=>{
            if(err){
                console.log(err);
                return;
            }
            if(!results){
                return res.json({
                    success: 0,
                    message: "record not found"
                });
            }
            return res,json({
                success: 1,
                data: results
            });
        });

    },
    getUsers: (req, res)=>{
        getUsers((err,results)=>{
            if(err){
                console.log(err);
                return;
            }
            return res.json({
                success: 1,
                data: results
            });
        });
    },
    updateUsers: (req, res) => {
        const body = req.body;
        const salt = genSaltSync(10);
        body.PassWord = hashSync(body.PassWord, salt);
        updateUser(body, (err, results) => {
            if(err){
                console.log(err);
                return;
            }
            return res.json({
                success: 1,
                message: "updated successfully"
            });
        });
    },
    login: (req, res)=>{
        const body = req.body;
        getUserByUserTKUser(body.UserName, (err, results)=>{
            if(err){
                console.log(err);
            }
            if(!results){
                return res.json({
                    success: 0,
                    data:"invalid username or password"
                });
            }
          //  console.log(body.PassWord);
         //   console.log(results.PassWord);
            const result = compareSync(body.PassWord, results.PassWord);
            const id=results.MaTK;
            if(result){
                results.PassWord= undefined;
                const jsontoken = sign({result: results}, "qwe1234",{expiresIn: "1h"
            });
            return res.json({
                success: 1,
                data:"login successfully",
                user: body.UserName,
                id: id,
                token: jsontoken
            });            
            }else{
                return res.json({
                    //success: 0,
                    data:"invalid username or password"
                });
            }
        });
    },
    changePassword : (req, res)=>{
        console.log("change password");
        const body = req.body;
        getUserByUserTKUser(body.UserName, (err, results)=>{
            if(err){
                console.log(err);
            }
            if(!results){
                return res.json({
                  //  success: 0,
                    data:"invalid username or password"
                });
            }
            const result = compareSync(body.old_PassWord, results.PassWord);
            if(result){
                const body = req.body;
                const salt = genSaltSync(10);
                body.new_password = hashSync(body.new_password, salt);
                updateUser(body, (err, results) => {
                    if(err){
                        console.log(err);
                        return;
                    }
                    return res.json({
                        data:"change password successfully"
                    });
                });           
            }else{
                return res.json({
                    //success: 0,
                    data:"invalid username or password"
                });
            }
        });
        
     },
     checkgmail: (req, res, next) => {
        const body=req.body;
        const email = req.body.Email;
        getUserByUserTKUser(body.UserName, (err, results)=>{
            if(err){
                console.log(err);
            }
            if(!results){
                return res.json({
                  //  success: 0,
                    data:"invalid username"
                });
            }              
        if(results.Email == email){
                var jsontoken = sign({result: results}, "qwe1234",{expiresIn: "60s" });
                return res.json({
                    success: 1,
                    data:"successfully",
                    email: email,
                    name: body.UserName,
                    token: jsontoken
                });         
         }else{
                return res.json({
                    //success: 0,
                    data:"email does already exits"
                });
            }

        });
    
     },
     resetpass: (req, res)=>{
        console.log("reset password");
        const body = req.body;
        console.log(body.name);
        console.log(body.new_password);
        getUserByUserTKUser(body.name, (err, results)=>{
            if(err){
                console.log(err);
            }
            if(!results){
                return res.json({
                    success: 0,
                    data:"invalid username or password"
                });
            }
            const id=results.MaTK;
            console.log(id);
                const salt = genSaltSync(10);
                body.new_password = hashSync(body.new_password, salt);     
                updateUser1(body.new_password,id,(err,results)=>{
                    if(err){
                        console.log(err);
                        return;
                    }
                    return res.json({
                        success:1,
                        data:"change password successfully"
                    });
                });
        });
      
     },
 };
