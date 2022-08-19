'use strict';

document.addEventListener('DOMContentLoaded', function () {
  const links = Array.from(document.querySelectorAll('.download-link'))

  links.forEach(link => {
    link.addEventListener('click', function () {
      const table = document.getElementById('table')
      let fileName = document.getElementById('fileName').value.trim()

      if (fileName === '') fileName = 'default'

      const fileExtension = this.getAttribute('id')
      this.setAttribute('download', fileName + '.' + fileExtension)
      if (fileExtension === 'xls') return ExcellentExport.excel(this, table)
      if (fileExtension === 'csv') return ExcellentExport.csv(this, table)
    })
  })
})
