var a=document.getElementById('D');
    var b=document.getElementById('S');
    var c=document.getElementById('P');
    var d=document.getElementById('EP');
    var e=document.getElementById('CP');
      b.addEventListener('click',(e)=>{
          document.getElementsByClassName('Dashboard')[0].style.display='none';
          document.getElementsByTagName('img')[0].style.display='none';
          document.getElementById('Search_donors').style.display='flex';
          document.getElementById('Edit_Profile').style.display='none';
          document.getElementById('Change_Password').style.display='none';
          document.getElementById('Profile').style.display='none';
          document.getElementById('li2').style.backgroundColor='#594f8d';
          document.getElementById('li1').style.backgroundColor='#fe0000';
          document.getElementById('li3').style.backgroundColor='#fe0000';
          document.getElementById('li4').style.backgroundColor='#fe0000';
          document.getElementById('li5').style.backgroundColor='#fe0000';
      })
      a.addEventListener('click',(e)=>{
        document.getElementsByClassName('Dashboard')[0].style.display='flex';
        document.getElementsByTagName('img')[0].style.display='flex';
        document.getElementById('Search_donors').style.display='none';
        document.getElementById('Edit_Profile').style.display='none';
        document.getElementById('Change_Password').style.display='none';
        document.getElementById('Profile').style.display='none';
        document.getElementById('li2').style.backgroundColor='#fe0000';
        document.getElementById('li1').style.backgroundColor='#594f8d';
        document.getElementById('li3').style.backgroundColor='#fe0000';
        document.getElementById('li4').style.backgroundColor='#fe0000';
        document.getElementById('li5').style.backgroundColor='#fe0000';
      })
      c.addEventListener('click',(e)=>{
        document.getElementsByClassName('Dashboard')[0].style.display='none';
        document.getElementsByTagName('img')[0].style.display='none';
        document.getElementById('Search_donors').style.display='none';
        document.getElementById('Edit_Profile').style.display='none';
        document.getElementById('Change_Password').style.display='none';
        document.getElementById('Profile').style.display='flex';
        document.getElementById('li2').style.backgroundColor='#fe0000';
        document.getElementById('li1').style.backgroundColor='#fe0000';
        document.getElementById('li3').style.backgroundColor='#594f8d';
        document.getElementById('li4').style.backgroundColor='#fe0000';
        document.getElementById('li5').style.backgroundColor='#fe0000';
      })
      d.addEventListener('click',(e)=>{
        document.getElementsByClassName('Dashboard')[0].style.display='none';
        document.getElementsByTagName('img')[0].style.display='none';
        document.getElementById('Search_donors').style.display='none';
        document.getElementById('Edit_Profile').style.display='flex';
        //document.getElementsByClassName('sidebar').style.height=''
        document.getElementById('Change_Password').style.display='none';
        document.getElementById('Profile').style.display='none';
        document.getElementById('li2').style.backgroundColor='#fe0000';
        document.getElementById('li1').style.backgroundColor='#fe0000';
        document.getElementById('li3').style.backgroundColor='#fe0000';
        document.getElementById('li4').style.backgroundColor='#594f8d';
        document.getElementById('li5').style.backgroundColor='#fe0000';
      })
      e.addEventListener('click',(e)=>{
        document.getElementsByClassName('Dashboard')[0].style.display='none';
        document.getElementsByTagName('img')[0].style.display='none';
        document.getElementById('Search_donors').style.display='none';
        document.getElementById('Edit_Profile').style.display='none';
        document.getElementById('Change_Password').style.display='flex';
        document.getElementById('Profile').style.display='none';
        document.getElementById('li2').style.backgroundColor='#fe0000';
        document.getElementById('li1').style.backgroundColor='#fe0000';
        document.getElementById('li3').style.backgroundColor='#fe0000';
        document.getElementById('li4').style.backgroundColor='#fe0000';
        document.getElementById('li5').style.backgroundColor='#594f8d';
      })