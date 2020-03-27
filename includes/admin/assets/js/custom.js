$(document).ready(function () {
//Sayfa yenilendiğinde tablonun sıralanmaya uygun olması için buraya ekledik sadece alttaki tek satır için bu yazı
    $(".sortable").sortable();
//Bize bir mesaj geliyor burada eğer silme işlemini onaylarsak direk alttaki "location" diye yazan urlye yönlendiriyor  
    $(".content-container ,.image_list_container").on('click','.remove-btn',function () {

        var $data_url = $(this).data("url");

        swal({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText : "Hayır"
        }).then(function (result) {
            if (result.value) {

                window.location.href = $data_url;
            }
        });

    })
    //eger bu istek content containerden yada .image_list_containerden geliyorsa bunların içersindeon metodunuuygula
    //change metodunu dinleycez hangi metodun change metodunu dinleycez isActive nin
    $(".content-container, .image_list_container").on('change','.isActive',function(){

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {
                
            });

        }

    })

    $(".isActive").change(function(){

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {

            });

        }

    })

    
    // Kapak Yenilenecek burada
      $(".image_list_container").on('change','.isCover' ,function(){

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {
                
                    $(".image_list_container").html(response);
                  // switchery burada tekrar koymazsan  inmput butonu güzel gözükmez
                     $('[data-switchery]').each(function () {
                var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                new Switchery(this, {
                    color: color,
                    size: size,
                    jackColor: jackColor
                });
            });
             $(".sortable").sortable();
            });
        }

    })
  // content containerin içerisinde yada image list containerin içerisnde on metodunu uygula sort update evenetini dinle hangi elementte ? sortable clasına sahip olan elementlerde yap
    $(".content-container ,.image_list_container").on("sortupdate",'.sortable', function(event, ui){

        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");

        $.post($data_url, {data : $data}, function(response){})

    })

    var uploadSection = Dropzone.forElement("#dropzone");
    //id si dropzone olan instınsını artık uploadSection elemntinin altında kullan
    uploadSection.on("complete",function(file){
        
        var $data_url = $("#dropzone").data("url");
        $.post($data_url,{},function(response){
           $(".image_list_container").html(response);
           
           $('[data-switchery]').each(function () {
                var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                new Switchery(this, {
                    color: color,
                    size: size,
                    jackColor: jackColor
                });
            });
             $(".sortable").sortable();
        });
        
    })
})