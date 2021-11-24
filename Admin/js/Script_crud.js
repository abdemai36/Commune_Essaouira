$( document ).ready(function() {

    //------------------------------------------------------------
    //----------- Management data of Admins
    //------------------------------------------------------------

    //select admins data
    function select_Data()
    {
        outPut="";
        $.ajax({
            url:"admins/select_adm.php",
            method:"GET",
            dataType:'JSON',
            success:function(data){
                if(data)
                    x=data;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut+="<tr class='text-center'><td>"+data[i].ID_user+"</td><td>"+data[i].F_name_user+"</td><td>"+data[i].L_name_user+"</td><td>"
                    +data[i].Email_user+"</td><td><button class='text-white bg-blue-600 rounded p-2 btn-edit' data-id-adm="+data[i].ID_user+">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete' data-id-adm="+data[i].ID_user+">Supprimer</button></td></tr>";
                }

                $("#tbody_admin").html(outPut);
            }
        })
    } 
    select_Data();

    //insert admins data
    $("#btn_add").on("click",function(e)
    {
        e.preventDefault();
        var id=$("#id_adm").val();
        var f_name=$("#f_name").val();
        var l_name=$("#l_name").val();
        var email=$("#email").val();
        var pwd=$("#pwd").val();
        MyData={id:id,f_name:f_name,l_name:l_name,pwd:pwd,email,email};
        $.ajax({
            url:"admins/Insert_adm.php",
            method:"POST",
            data:JSON.stringify(MyData),
            success:function(data){    
                Swal.fire({
                    title: data
                })
                $("#Form_adm")[0].reset();
                select_Data();
            }
        })
    });

     //Delete admins data
     $("tbody").on('click','.btn-delete',function(){
        var id_adm=$(this).attr("data-id-adm");
        MyData_del={id_adm:id_adm};
        this_btn=this;
        $.ajax({
            url:"admins/delete_adm.php",
            method:"POST",
            data:JSON.stringify(MyData_del),
            success:function(data)
            {
                Swal.fire({
                    title: data
                })
                $(this_btn).closest("tr").fadeOut("slow");
                select_Data();
            }
        })
    });

    //Edit admins data
    $("tbody").on('click','.btn-edit',function(){

        var id=$(this).attr("data-id-adm");
        MyData={id:id};
        $.ajax({
            url:"admins/edit_adm.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData),
            success:function(data)
            {
                $("#id_adm").val(data.ID_user);
                $("#f_name").val(data.F_name_user);
                $("#l_name").val(data.L_name_user);
                $("#email").val(data.Email_user);
                $("#pwd").val(data.Pwd_user);
            }
        })
    });

    //------------------------------------------------------------
    //----------- Management data of Categorys
    //------------------------------------------------------------
    //select Categorie data
    function select_categorie_Data()
    {
        outPut_categorie="";
        $.ajax({
            url:"Categories/select_categorie.php",
            method:"GET",
            dataType:'JSON',
            success:function(data){
                if(data)
                    x=data;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut_categorie+="<tr class='text-center'><td>"+data[i].ID_category+"</td><td>"+data[i].Titre_categorie_fr+"</td><td dir='rtl'>"+data[i].Titre_categorie_ar+"</td>"+
                    "<td><button class='text-white bg-blue-600 rounded p-2 btn-edit' data-id-Categorie="+data[i].ID_category+">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete' data-id-Categorie="+data[i].ID_category+">Supprimer</button></td></tr>";
                }

                $("#tbody_categorie").html(outPut_categorie);
            }
        })
    } 
    select_categorie_Data();

    //insert Categorie data
    $("#add_categorie").on("click",function(e)
    {
        e.preventDefault();
        var id=$("#id_categorie").val();
        var category_fr=$("#category_fr").val();
        var category_ar=$("#category_ar").val();

        MyData={id:id,category_fr:category_fr,category_ar:category_ar};
        $.ajax({
            url:"Categories/insert_categorie.php",
            method:"POST",
            data:JSON.stringify(MyData),
            success:function(data){    
                Swal.fire({
                    title: data
                })
                $("#Form_categorie")[0].reset();
                select_categorie_Data();
            }
        })
    });

     //Delete Categorie data
     $("tbody").on('click','.btn-delete',function(){
        var id_categorie=$(this).attr("data-id-Categorie");
        MyData_del={id:id_categorie};
        this_btn=this;
        $.ajax({
            url:"Categories/delete_categorie.php",
            method:"POST",
            data:JSON.stringify(MyData_del),
            success:function(data)
            {
                Swal.fire({
                    title: data
                })
                select_categorie_Data();
                $(this_btn).closest("tr").fadeOut("slow");
            }
        })
    });

    //Edit Categorie data
    $("tbody").on('click','.btn-edit',function(){

        var id=$(this).attr("data-id-Categorie");
        MyData={id:id};
        $.ajax({
            url:"Categories/edit_categorie.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData),
            success:function(data)
            {
                $("#id_categorie").val(data.ID_category);
                $("#category_fr").val(data.Titre_categorie_fr);
                $("#category_ar").val(data.Titre_categorie_ar);
            }
        })
    });

    //------------------------------------------------------------
    //----------- Management data of village
    //------------------------------------------------------------
    //select Categorie data
    function select_village_Data()
    {
        outPut_village="";
        $.ajax({
            url:"Village/select_village.php",
            method:"GET",
            dataType:'JSON',
            success:function(data){
                if(data)
                    x=data;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut_village+="<tr class='text-center'><td>"+data[i].ID_village+"</td><td>"+data[i].Titre_village_fr+"</td><td dir='rtl'>"+data[i].Titre_village_ar+"</td>"+
                    "<td><button class='text-white bg-blue-600 rounded p-2 btn-edit' data-id-village="+data[i].ID_village+">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete' data-id-village="+data[i].ID_village+">Supprimer</button></td></tr>";
                }

                $("#tbody_village").html(outPut_village);
            }
        })
    } 
    select_village_Data();

    //insert village data
    $("#btn_add_village").on("click",function(e)
    {
        e.preventDefault();
        var id=$("#id_village").val();
        var village_fr=$("#name_village_fr").val();
        var village_ar=$("#name_village_ar").val();

        MyData={id:id,village_fr:village_fr,village_ar:village_ar};
        $.ajax({
            url:"Village/insert_village.php",
            method:"POST",
            data:JSON.stringify(MyData),
            success:function(data){    
                Swal.fire({
                    title: data
                })
                $("#Form_village")[0].reset();
                select_village_Data();
            }
        })
    });

    //Delete village data
    $("tbody").on('click','.btn-delete',function(){
    var id_village=$(this).attr("data-id-village");
    MyData_del={id:id_village};
    this_btn=this;
    $.ajax({
        url:"Village/delete_village.php",
        method:"POST",
        data:JSON.stringify(MyData_del),
        success:function(data)
        {
            Swal.fire({
                title: data
            })
            select_village_Data();
            $(this_btn).closest("tr").fadeOut("slow");
        }
        })
    });

    //Edit vilage data
    $("tbody").on('click','.btn-edit',function(){

        var id=$(this).attr("data-id-village");
        MyData={id:id};
        $.ajax({
            url:"Village/edit_village.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData),
            success:function(data)
            {
                $("#id_village").val(data.ID_village );
                $("#name_village_fr").val(data.Titre_village_fr);
                $("#name_village_ar").val(data.Titre_village_ar);
            }
        })
    });

    //------------------------------------------------------------
    //----------- Management data of articles
    //------------------------------------------------------------
    //insert article data
    $("#frm_article").on("submit",function(e)
    {
        e.preventDefault();
        var id_article=$("#id_article").val();
        var title_fr=$("#title_fr").val();
        var title_ar=$("#title_ar").val();
        var categories=$("#categories").val();
        var village=$("#village").val();
        var Description_fr=CKEDITOR.instances['Description_fr'].updateElement();
        var Description_ar=CKEDITOR.instances['Description_ar'].updateElement();;
        var img_article=$("#img_article")[0].files;
        
        if(img_article.length>0 && title_fr!="" && title_ar!="" &&  Description_ar!="" && Description_fr!="" )
        {
            $.ajax({
                url:"articles/insert_article.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){ 
                    Swal.fire(data);
                    $("#frm_article")[0].reset();
                    select_Data_article();
                }
                })
        }
        else{
            Swal.fire("Saisir tous les informations !")
        }

    });

    //select article data
    function select_Data_article()
    {
        outPut_article="";
        
        $.ajax({
            url:"articles/select_article.php",
            method:"GET",
            dataType:'JSON',
            success:function(data_article){
                if(data_article)
                    x=data_article;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut_article +="<tr class='text-center'>"
                    +"<td>"+data_article[i].ID_article  +"</td>"+
                    "<td>"+data_article[i].Titre_fr+"</td>"+
                    "<td>"+data_article[i].Titre_ar+"</td>"+
                    "<td>"+data_article[i].Titre_categorie_fr+"</td>"+
                    "<td>"+data_article[i].Titre_village_fr+"</td>"+
                    "<td>"+data_article[i].Description_fr.substr(0,40)+"...</td>"+
                    "<td>"+data_article[i].Description_ar.substr(0,40)+"...</td>"+
                    "<td><img style='width:90px;height:90px;' src='avatar/"+data_article[i].Image+"'></td>"+
                    "<td>"+data_article[i].Date+"</td>"+
                    "<td><button class='text-white bg-blue-600 rounded p-2 btn-edit' data-id-article="+data_article[i].ID_article+">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete' data-id-article="+data_article[i].ID_article+">Supprimer</button>";
                }
                $("#tbody_article").html(outPut_article);
            }
        })
    } 
    select_Data_article();

    //Delete article data
    $("tbody").on('click','.btn-delete',function(){
        var id_article=$(this).attr("data-id-article");
        MyData_del={id:id_article};
        this_btn=this;
        $.ajax({
            url:"articles/delete_article.php",
            method:"POST",
            data:JSON.stringify(MyData_del),
            success:function(data)
            {
                Swal.fire({
                    title: data
                })
                select_Data_article();
                $(this_btn).closest("tr").fadeOut("slow");
            }
        })
    });

    //Edit article data
    $("tbody").on('click','.btn-edit',function(){

        var id=$(this).attr("data-id-article");
        MyData={id:id};
        $.ajax({
            url:"articles/edit_article.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData),
            success:function(data)
            {
                $("#id_article").val(data.ID_article);
                $("#title_fr").val(data.Titre_fr);
                $("#title_ar").val(data.Titre_ar);
                $("#categories").val(data.ID_category).change();
                $("#village").val(data.ID_village).change();

                CKEDITOR.instances['Description_fr'].setData(data.Description_fr);
                CKEDITOR.instances['Description_ar'].setData(data.Description_ar);

            }
        })
    });

    
    //------------------------------------------------------------
    //----------- Management data of je veux
    //------------------------------------------------------------
    //select je veux data
    function select_Data_jeveux()
    {
        outPut_jeveux="";
        
        $.ajax({
            url:"je_veux/select_je_veux.php",
            method:"GET",
            dataType:'JSON',
            success:function(data_jeveux){
                if(data_jeveux)
                    x=data_jeveux;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut_jeveux +="<tr class='text-center'>"
                    +"<td>"+data_jeveux[i].ID_jeveux+"</td>"+
                    "<td>"+data_jeveux[i].Titre_jeveux_fr+"</td>"+
                    "<td>"+data_jeveux[i].Titre_jeveux_ar+"</td>"+
                    "<td>"+data_jeveux[i].cetegorie_fr+"</td>"+
                    "<td>"+data_jeveux[i].Description_fr.substr(0,40)+"...</td>"+
                    "<td>"+data_jeveux[i].Description_ar.substr(0,40)+"...</td>"+
                    "<td>"+data_jeveux[i].Date+"</td>"+
                    "<td><button class='text-white bg-blue-600 rounded p-2 btn-edit-jeveux' data-id-jeveux="+data_jeveux[i].ID_jeveux +">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete-jeveux' data-id-jeveux="+data_jeveux[i].ID_jeveux +">Supprimer</button>";
                }
                $("#tbody_jeveux").html(outPut_jeveux);
            }
        })
    } 
    select_Data_jeveux();

    //insert je veux data
    $("#frm_jeveux").on("submit",function(e)
    {
        e.preventDefault();
        var id_jeveux=$("#id_jeveux").val();
        var title_fr=$("#title_jeveux_fr").val();
        var title_ar=$("#title_jeveux_ar").val();
        var categories=$("#categories_jeveux").val();
        var Description_fr=CKEDITOR.instances['Description_jeveux_fr'].updateElement();
        var Description_ar=CKEDITOR.instances['Description_jeveux_ar'].updateElement();

        
        if(title_fr!="" && title_ar!="" &&  Description_ar!="" && Description_fr!="" && categories!="")
        {
            $.ajax({
                url:"je_veux/insert_jeveux.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){ 
                    Swal.fire(data);
                    $("#frm_jeveux")[0].reset();
                    select_Data_jeveux();
                }
                })
        }
        else{
            Swal.fire("Saisir tous les informations !")
        }

    });

    //Delete je veux data
    $("tbody").on('click','.btn-delete-jeveux',function(){
        var id_je_veux=$(this).attr("data-id-jeveux");
        MyData_del_jeveux={id:id_je_veux};
        this_btn_jeveux=this;
        $.ajax({
            url:"je_veux/delete_jeveux.php",
            method:"POST",
            data:JSON.stringify(MyData_del_jeveux),
            success:function(data_jeveux)
            {
                Swal.fire({
                    title: data_jeveux
                })
                select_Data_article();
                $(this_btn_jeveux).closest("tr").fadeOut("slow");
            }
        })
    });

      //Edit je veux data
      $("tbody").on('click','.btn-edit-jeveux',function(){

        var id_jeveux=$(this).attr("data-id-jeveux");
        MyData_jeveux={id:id_jeveux};
        $.ajax({
            url:"je_veux/edit_jeveux.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData_jeveux),
            success:function(data)
            {
                $("#id_jeveux").val(data.ID_jeveux);
                $("#title_jeveux_fr").val(data.Titre_jeveux_fr);
                $("#title_jeveux_ar").val(data.Titre_jeveux_ar);
                $("#categories_jeveux").val(data.cetegorie_fr).change();
 
                CKEDITOR.instances['Description_jeveux_fr'].setData(data.Description_fr);
                CKEDITOR.instances['Description_jeveux_ar'].setData(data.Description_ar);

            }
        })
    });

    //------------------------------------------------------------
    //----------- Management data of Annonce
    //------------------------------------------------------------
    //insert annonce data
    $("#frm_annonce").on("submit",function(e)
    {
        e.preventDefault();
        var id_annonce=$("#id_annonce").val();
        var titre_fr=$("#titre_fr").val();
        var titre_ar=$("#titre_ar").val();
        var place_fr=$("#place_fr").val();
        var place_ar=$("#place_ar").val();
        var categories=$("#categorie").val();
        var village=$("#village").val();
        var date = new Date($('#date_annonce').val());
        var rb_isannonce=$("input[name='rb_isannonce']:checked").val()
        var Description_fr=CKEDITOR.instances['Description_fr'].updateElement();
        var Description_ar=CKEDITOR.instances['Description_ar'].updateElement();;
        var img_annonce=$("#img_annonce")[0].files;
        
        if(img_annonce.length>0 && titre_fr!="" && date!="" && village!="" && categories!="" && titre_ar!="" && place_fr!="" && place_ar!="" &&  Description_ar!="" && Description_fr!="" )
        {
            $.ajax({
                url:"annonce/insert_annonce.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){ 
                    Swal.fire(data);
                    $("#frm_annonce")[0].reset();
                    select_Data_annonce();
                }
                })
        }
        else{
            Swal.fire("Saisir tous les informations !")
        }

    });

    //select annonce data
    function select_Data_annonce()
    {
        outPut_annonce="";
        
        $.ajax({
            url:"annonce/select_annonce.php",
            method:"GET",
            dataType:'JSON',
            success:function(data_annonce){
                if(data_annonce)
                    x=data_annonce;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut_annonce +="<tr class='text-center'>"
                    +"<td>"+data_annonce[i].ID_annonce_event +"</td>"+
                    "<td>"+data_annonce[i].Titre_annonce_fr+"</td>"+
                    "<td>"+data_annonce[i].Titre_annonce_ar+"</td>"+
                    "<td>"+data_annonce[i].Titre_categorie_fr+"</td>"+
                    "<td>"+data_annonce[i].Titre_village_fr+"...</td>"+
                    "<td>"+data_annonce[i].Description_fr.substr(0,40)+"...</td>"+
                    "<td>"+data_annonce[i].Description_ar.substr(0,40)+"...</td>"+
                    "<td>"+data_annonce[i].Date_annonce+"</td>"+
                    "<td>"+data_annonce[i].is_annonce+"</td>"+
                    "<td>"+data_annonce[i].place_fr+"</td>"+
                    "<td><img style='width:90px;height:90px;' src='avatar/"+data_annonce[i].image+"'></td>"+
                    "<td><button class='text-white bg-blue-600 rounded p-2 btn-edit-annonce' data-id-annonce="+data_annonce[i].ID_annonce_event+">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete-annonce' data-id-annonce="+data_annonce[i].ID_annonce_event+">Supprimer</button>";
                }
                $("#tbody_annonce").html(outPut_annonce);
            }
        })
    } 
    select_Data_annonce();

    //Edit je veux data
    $("tbody").on('click','.btn-edit-annonce',function(){

        var id_annonce=$(this).attr("data-id-annonce");
        MyData_annonce={id:id_annonce};
        $.ajax({
            url:"annonce/edit_annonce.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData_annonce),
            success:function(data)
            {
                $("#id_annonce").val(data.ID_annonce_event);
                $("#titre_fr").val(data.Titre_annonce_fr);
                $("#titre_ar").val(data.Titre_annonce_ar);
                $("#place_fr").val(data.place_fr);
                $("#place_ar").val(data.place_ar);
                $("#categorie").val(data.ID_category ).change();
                $("#village").val(data.ID_village ).change();
                $("#date_annonce").val(data.Date_annonce);
                if($("#rb_annonce").val()==data.is_annonce){
                    $("#rb_annonce").attr('checked', 'checked');
                }else if($("#rb_evénement").val()==data.is_annonce){
                    $("#rb_evénement").attr('checked', 'checked');
                }
 
                CKEDITOR.instances['Description_fr'].setData(data.Description_fr);
                CKEDITOR.instances['Description_ar'].setData(data.Description_ar);

            }
        })
    });

    //Delete annonce data
    $("tbody").on('click','.btn-delete-annonce',function(){
        var id_annonce=$(this).attr("data-id-annonce");
        MyData_del_annonce={id:id_annonce};
        this_btn_annonce=this;
        $.ajax({
            url:"annonce/delete_annonce.php",
            method:"POST",
            data:JSON.stringify(MyData_del_annonce),
            success:function(data_annonce)
            {
                Swal.fire({
                    title: data_annonce
                })
                select_Data_article();
                $(this_btn_annonce).closest("tr").fadeOut("slow");
            }
        })
    });


    
});