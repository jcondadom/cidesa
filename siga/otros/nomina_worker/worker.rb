# Lanzar Sidekiq
# ./bin/sidekiq -r ./worker.rb
#
# Probar en la consola
# irb -r ./worker.rb
#                                hostname    env  schema    nomina  empleado   ultfec         profec
# > NominaWorker::perform_async "localhost", "", "SIMA014", "004", "1299263", "01/08/2014", "15/08/2014"
require 'sidekiq'
require 'redis'
require 'sidekiq/api'

require 'curb'


Sidekiq.configure_server do |config|
  config.redis = { :namespace => 'nomina' }
end

Sidekiq.configure_client do |config|
  config.redis = { :namespace => 'nomina', :size => 10 }
end

class NominaWorker
  include Sidekiq::Worker

  def perform(host, entorno, schema, nomina, persona, ultfec, profec)
    puts "Workin on #{persona}"
    puts "host: #{host}"
    puts "entorno: #{entorno}"
    puts "schema: #{schema}"
    puts "nomina: #{nomina}"
    puts "persona: #{persona}"
    puts "ultfec: #{ultfec}"
    puts "profec: #{profec}"
    http = Curl.post("http://#{host}/nomina#{entorno}.php/nomnomcalnomind/ajax/ajax/3/schema/#{schema}", { 
                  :module => "nomnomcalnomind", 
                  :action => "ajax", 
                  :id => "", 
                  :entorno => "_prod", 
                  "npnomina[codnom]" => nomina, 
                  "npnomina[ultfec]" => ultfec, 
                  "npnomina[profec]" => profec, 
                  :msem2 => "0", 
                  :opsi => "NO", 
                  :ax_0_1 => "1", 
                  :ax0id => "", 
                  :ax_0_2 => persona})
    puts http.head
  end
end

class ImprimirFacturaWorker
  include Sidekiq::Worker

  def perform(datos)
    puts datos.to_s
    sleep 15
    puts "Listo!"
  end
end