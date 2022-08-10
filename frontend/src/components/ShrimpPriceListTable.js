import React from 'react';
import {
    TableContainer,
    Table,
    Thead,
    Tr,
    Th,
    Tbody,
    Td,
    Button
} from '@chakra-ui/react';
import { Link } from 'react-router-dom';


const ShrimpPriceListTable = ({ priceLists }) => {
    const currencyFormatter = (symbol, price) => {
        return new Intl.NumberFormat(`id-ID`, {
            currency: symbol,
            style: 'currency',
            minimumFractionDigits: 0,
        }).format(price) + ',-';
    }


    return (
        <TableContainer>
            <Table size='md' variant={'striped'}>
                <Thead>
                <Tr>
                    <Th>Tanggal</Th>
                    <Th>Lokasi</Th>
                    <Th>Supplier</Th>
                    <Th>Harga Size 100</Th>
                    <Th>Action</Th>
                </Tr>
                </Thead>
                <Tbody>
                {priceLists.data.map(price => (
                    <Tr key={price.id}>
                        <Td>{price.date}</Td>
                        <Td>{price.region.name}</Td>
                        <Td>{price.creator.name}</Td>
                        <Td>{currencyFormatter(price.currency.symbol, price.size_100)}</Td>
                        <Td>
                            <Button colorScheme='blue' size='sm'>
                                <Link to={`/harga-udang/${price.id}`}>
                                    Lihat Detail
                                </Link>
                            </Button>
                        </Td>
                    </Tr>
                ))}
                </Tbody>
            </Table>
        </TableContainer>
    );
}

export default ShrimpPriceListTable;