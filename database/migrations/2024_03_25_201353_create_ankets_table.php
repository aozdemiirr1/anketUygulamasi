<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ankets', function (Blueprint $table) {
            $table->id();
            $table->string('soru');
            $table->json('secenekler');
            $table->timestamps();
        });

        // Örnek anketlerin eklenmesi
        $anketler = [
            [
                'soru' => 'Hangi renkleri tercih edersiniz?',
                'secenekler' => json_encode(['Kırmızı', 'Mavi', 'Yeşil', 'Sarı', 'Pembe'])
            ],
            [
                'soru' => 'Hangi meyveyi daha çok seversiniz?',
                'secenekler' => json_encode(['Elma', 'Muz', 'Çilek', 'Portakal', 'Üzüm'])
            ],
            [
                'soru' => 'Hangi film türlerini izlemeyi tercih edersiniz?',
                'secenekler' => json_encode(['Aksiyon', 'Komedi', 'Bilim Kurgu', 'Romantik', 'Korku'])
            ],
            [
                'soru' => 'Hangi hayvanı daha çok seversiniz?',
                'secenekler' => json_encode(['Köpek', 'Kedi', 'Kuş', 'Balık', 'Tavşan'])
            ],
            [
                'soru' => 'Hangi tatlıyı daha çok tercih edersiniz?',
                'secenekler' => json_encode(['Pasta', 'Dondurma', 'Çikolata', 'Kek', 'Baklava'])
            ],
        ];

        foreach ($anketler as $anket) {
            DB::table('ankets')->insert([
                'soru' => $anket['soru'],
                'secenekler' => $anket['secenekler'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('ankets');
    }
};
