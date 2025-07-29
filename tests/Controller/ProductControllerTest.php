namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testCreateProduct(): void
    {
        $client = static::createClient();
        
        $client->request('POST', '/product');
        
        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
        
        $responseData = json_decode($client->getResponse()->getContent(), true);
        
        $this->assertArrayHasKey('id', $responseData);
        $this->assertArrayHasKey('name', $responseData);
        $this->assertEquals('Keyboard', $responseData['name']);
    }
    
    public function testGetProduct(): void
    {
        $client = static::createClient();
        
        // First create a product
        $client->request('POST', '/product');
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $productId = $responseData['id'];
        
        // Then get it
        $client->request('GET', '/product/'.$productId);
        
        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
        
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals($productId, $responseData['id']);
    }
}