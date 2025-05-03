    <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline"></div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2024&nbsp;
          <a href="#" class="text-decoration-none"></a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?php echo base_url();?>dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous" ></script> <!-- sortablejs -->
    <script>
      const connectedSortables = document.querySelectorAll('.connectedSortable');
      connectedSortables.forEach((connectedSortable) => {
        let sortable = new Sortable(connectedSortable, {
          group: 'shared',
          handle: '.card-header',
        });
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts --> 

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
      <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
      <script>
        new DataTable('#example');

        $('#summernote').summernote({
        height: 300,
        callbacks: {
            onImageUpload: function(files) {
                let editor = $(this);
                let reader = new FileReader();
                
                reader.onload = function(e) {
                    let image = `<figure class="image-with-caption">
                                    <img src="${e.target.result}" alt="Image">
                                    <figcaption contenteditable="true">Enter caption here...</figcaption>
                                 </figure>`;
                    editor.summernote('pasteHTML', image);
                };
                
                reader.readAsDataURL(files[0]);
            }
        }
    });


    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['insert', ['picture', 'imageWithCaption']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                let editor = $(this);
                let reader = new FileReader();

                reader.onload = function(e) {
                    let imageWithCaption = `<figure class="image-with-caption">
                                                <img src="${e.target.result}" alt="Image">
                                                <figcaption contenteditable="true">Enter caption here...</figcaption>
                                            </figure>`;
                    editor.summernote('pasteHTML', imageWithCaption);
                };

                reader.readAsDataURL(files[0]);
            }
        }
    });

    // Resize figure dynamically when image is resized
    $(document).on('mousedown', '.image-with-caption img', function() {
        let img = $(this);
        let figure = img.closest('.image-with-caption');

        let observer = new MutationObserver(() => {
            figure.width(img.width()); // Adjust figure width to match image
        });

        observer.observe(img[0], { attributes: true, attributeFilter: ['style'] });
    });



      </script>


    <script type="text/javascript">
      setInterval(function(){ $(".alert").fadeOut("slow"); }, 5000);
    </script>
  </body>
  <!--end::Body-->
</html>
