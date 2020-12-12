<?php include "lib/header.php" ?>
    <div style="margin-left: 15%">
    <article id="box">
        <div style="text-align: center;"><h2>Thêm nhân viên</h2></div>
                         <form method="post" action="register.php">
                            <table class="w3-table-all w3-hoverable">
                                <thead>
                                    
                                        <tr>    
                                                <td>Tên nhân viên</td>
                                                <td><input type="text" size="40" name="name" id="name" placeholder="Enter your Name" />*</td>
                                        </tr>
                                  
                                       
                            
                           <tr>
                            <td>Chức vụ</td>
                                                 <td>
                                                <select name="op" id="chon" style="width: 50%">
                                                    <option value="0">Nhân viên</option>
                                                </select>
                                            </td>
                                            
                                       </tr>
                                   <tr> 
                                    <td>Email:</td>
                                    <td><input type="text" size="40"name="email" id="email" placeholder="Enter your Email" />*</td>
                                </tr>
                                 <tr> 
                                    <td>Username:</td>
                                    <td><input type="text" size="40" name="username" id="username" placeholder="Enter your Username" />*</td>
                                </tr>
                                <tr> 
                                    <td>Password:</td>
                                    <td><input type="password"  size="40" name="password_1" placeholder="Enter your Password" />*</td>
                                </tr>
                                 <tr> 
                                    <td>Confirm Password:</td>
                                    <td><input type="password"  size="40" name="password_2" placeholder="Confirm your Password" />*</td>
                                </tr>   
                                    
                                    <tr>
                                        <td colspan="2"><button type="submit" size="20" class="btn btn-primary btn-lg btn-block login-button" name="reg_user" style="background-color: black">Thêm</button></td>
                                    </tr>

                                    
                                    <tr>
                                       <td colspan="2"> (*): required</td>
                                     </tr>
                                 </thead>
                                     </table>
                                </form>

                            </div>
  </article>                          
<?php include "lib/footer.php" ?>
</div>
                       

</body>
</html>