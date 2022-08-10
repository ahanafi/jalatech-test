import React, { useState, useEffect } from 'react';
import {
    Box,
    Flex,
    FormLabel,
    Select
} from '@chakra-ui/react';

const species = ['Vannamei'];

const FilterBar = ({ regions, shrimpPrices }) => {
    const [sizes, setSizes] = useState([]);
    const filterSize = () => Object.keys(shrimpPrices.data[0]).filter( key => key.indexOf("size_") > -1);
    

    (useEffect(() => {
        const filteredSize = filterSize();
        setSizes(filteredSize);
    }, []));

    const labelSize = (str) => {
        let size = str.charAt(0).toUpperCase() + str.slice(1);
        return size.split('_').join(' ');
    };

    const valueSize = (str) => str.split('_')[1];
    
    return (
        <Box px={100} bg='white'>
            <Flex h={16} alignItems={'center'} justifyContent={'space-evenly'}>
                <FormLabel>Filter:</FormLabel>
                <Select rounded={0} placeholder='Pilih Lokasi' bg='white' mr={10}>
                    {regions.data.map(region => (
                        <option key={ region.id } value={ region.id }>
                            { region.full_name }
                        </option>
                    ))}
                </Select>

                <Select rounded={0} placeholder='Pilih Ukuran' bg='white' mr={10}>
                    {sizes.map((size, index) => (
                        <option key={ index } value={ valueSize(size) }>
                            { labelSize(size) }
                        </option>
                    ))}
                </Select>

                <Select rounded={0} bg='white'>
                    {species.map((type, index) => (
                        <option key={ index } value={ type }>
                            { type }
                        </option>
                    ))}
                </Select>
            </Flex>
        </Box>
    );
}

export default FilterBar;