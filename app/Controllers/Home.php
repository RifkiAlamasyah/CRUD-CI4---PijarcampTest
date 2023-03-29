<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Home extends BaseController
{
    protected  $produkModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Product APP',
            'produk' => $this->produkModel->findAll()
        ];

        return view('pages/home', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Product APP detail',
            'produkDetail' => $this->produkModel->find($id)
        ];

        return view('pages/detail', $data);
    }


    public function create()
    {
        $data = [
            'tittle'  => 'Form tambah Data Produk',
        ];

        return view('pages/create', $data);
    }

    public function save()
    {
        try {
            $data = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'keterangan' => $this->request->getPost('keterangan'),
                'harga' => $this->request->getPost('harga'),
                'jumlah' => $this->request->getPost('jumlah')
            ];

            $this->produkModel->insert($data);

            session()->setFlashdata('success', 'Data berhasil ditambahkan.');

            return redirect()->to('/');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Produk',
            'produk' => $this->produkModel->find($id)
        ];

        return view('pages/edit', $data);
    }

    public function update()
    {
        try {
            $data = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'keterangan' => $this->request->getPost('keterangan'),
                'harga' => $this->request->getPost('harga'),
                'jumlah' => $this->request->getPost('jumlah')
            ];

            $id = $this->request->getPost('id');

            $this->produkModel->update($id, $data);

            session()->setFlashdata('success', 'Data berhasil diupdate.');

            return redirect()->to('/');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->produkModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data.');
        }
        return redirect()->to('/');
    }

    public function search()
    {
        try {
            $keyword = $this->request->getVar('keyword');
            $data = [
                'title' => 'Hasil Pencarian',
                'produk' => $this->produkModel->search($keyword)
            ];

            return view('pages/home', $data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
